<?php
// table.php - 最終修復版（修正 generateTbody 標籤遺失問題）

error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start('ob_gzhandler');
header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

const API_BASE_URL = 'https://rt.data.gov.hk/v1/transport/mtr/lrt/getSchedule';
const API_TIMEOUT  = 5;
const CACHE_TTL    = 35;
const DEFAULT_ID  = '220';
const CACHE_DIR   = __DIR__ . '/cache/';
const LOG_DIR     = __DIR__ . '/logs/';

if (!is_dir(CACHE_DIR)) @mkdir(CACHE_DIR, 0755, true);
if (!is_dir(LOG_DIR))   @mkdir(LOG_DIR, 0755, true);

function logError($msg) {
    $file = LOG_DIR . 'error_' . date('Y-m-d') . '.log';
    file_put_contents($file, date('[Y-m-d H:i:s] ') . $msg . "\n", FILE_APPEND);
}

$stationId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^\d{3}$/']]) ?: DEFAULT_ID;

$data = getScheduleData($stationId);

if (!$data || !isset($data['platform_list'])) {
    echo '<tr><td colspan="4" class="text-danger text-center py-4">無法載入輕鐵數據，請稍後再試</td></tr>';
    exit;
}

echo "<!-- system_time:" . ($data['system_time'] ?? '未知') . " -->\n";
echo generateTbody($data);

function getScheduleData($stationId) {
    $cacheFile = CACHE_DIR . 'lrt_' . md5($stationId) . '.json';

    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < CACHE_TTL) {
        $json = file_get_contents($cacheFile);
        if ($json) {
            $data = json_decode($json, true);
            if (is_array($data)) return $data;
        }
    }

    $url = API_BASE_URL . '?station_id=' . urlencode($stationId);
    $ctx = stream_context_create(['http' => ['timeout' => API_TIMEOUT, 'ignore_errors' => true]]);
    $response = @file_get_contents($url, false, $ctx);

    if ($response === false || empty($response)) {
        if (file_exists($cacheFile)) {
            $json = file_get_contents($cacheFile);
            if ($json) return json_decode($json, true);
        }
        return null;
    }

    $data = json_decode($response, true);
    if (!$data || !isset($data['status']) || $data['status'] !== 1) {
        if (file_exists($cacheFile)) {
            $json = file_get_contents($cacheFile);
            if ($json) return json_decode($json, true);
        }
        return null;
    }

    file_put_contents($cacheFile, json_encode($data, JSON_UNESCAPED_UNICODE));
    return $data;
}

function generateTbody($data) {
    $html = '';

    foreach ($data['platform_list'] as $platform) {
        $platId = htmlspecialchars($platform['platform_id'] ?? '－');
        $html .= '<tr><td colspan="4" class="table-primary text-center fw-bold">月台：' . $platId . '</td></tr>' . "\n";

        foreach ($platform['route_list'] ?? [] as $route) {
            $routeNo  = htmlspecialchars($route['route_no']  ?? '－');
            $destCh   = htmlspecialchars($route['dest_ch']   ?? '－');
            $timeCh   = htmlspecialchars($route['time_ch']   ?? '－');
            $trainLen = $route['train_length'] ?? '';

            $imgTag = $trainLen ? '<img src="/images/' . $trainLen . '.png" alt="' . $trainLen . '卡" loading="lazy" style="height:24px;">' : '－';

            $html .= '<tr><td><strong>' . $routeNo . '</strong></td><td>' . $destCh . '</td><td>' . $imgTag . '</td><td><strong>' . $timeCh . '</strong></td></tr>' . "\n";
        }
    }

    if (empty($html)) {
        $html = '<tr><td colspan="4" class="text-center py-4">暫無列車資料</td></tr>';
    }

    return $html;
}
?>
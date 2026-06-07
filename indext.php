<!DOCTYPE html>
<html lang="zh-HK">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="theme-color" content="#1a73e8">
<link rel="apple-touch-icon" sizes="192x192" href="/icons/192.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<!-- PWA Manifest -->
<link rel="manifest" href="/manifest.json" crossorigin="use-credentials">

<style>
/* ========================= */
/* PWA狀態欄專用CSS - 完全禁用 */
/* ========================= */

#pwa-status-bar {
    display: none !important;
    height: 0 !important;
}

#pwa-status-bar-content {
    display: none !important;
}

/* ========================= */
/* 主要頁面樣式 - 最終修正版 (無底部時間) */
/* ========================= */
body {
  font-family: 'Inter', sans-serif;
  margin: 0;
  background-color: #f8fafc;
  color: #2d2d2d;
  padding-top: 0 !important;
  overflow-x: hidden;
}

/* 整個頁面內容容器 */
.page-container {
  position: relative;
  width: 100%;
  min-height: 100vh;
}

/* Navbar - 永遠固定在頂部 */
.navbar {
  background: linear-gradient(90deg, rgba(26,115,232,0.95), rgba(66,133,244,0.95));
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  padding: 0.75rem 1rem;
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  right: 0 !important;
  z-index: 9999 !important;
  width: 100% !important;
  margin: 0 !important;
}

/* 主要內容區域 - 從導航欄下方開始 */
.main-content {
  position: relative;
  width: 100%;
  padding-top: 60px;
  min-height: calc(100vh - 60px);
}

.navbar-brand {
  font-size: 1.5rem;
  font-weight: 700;
  color: #fff;
  letter-spacing: 0.5px;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}
.navbar-nav .nav-link {
  font-size: 1.05rem;
  font-weight: 500;
  color: #e9efff;
  padding: 0.8rem 1.3rem;
  border-radius: 8px;
  transition: background-color 0.2s ease, transform 0.2s ease;
}
.navbar-nav .nav-link:hover {
  background-color: rgba(255,255,255,0.15);
  color: #fff;
  transform: scale(1.02);
}
.navbar-nav .nav-link.active {
  background-color: rgba(255,255,255,0.25);
  color: #fff;
}
.navbar-toggler {
  border: none;
  padding: 0.5rem;
}
.navbar-toggler:focus {
  box-shadow: none;
}
.navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255,255,255,0.9)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

/* 天氣按鈕樣式 */
#weather-toggle-btn {
  border: 2px solid rgba(255, 255, 255, 0.3);
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #ffd700, #ff9500);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

#weather-toggle-btn:hover {
  background: linear-gradient(135deg, #ff9500, #ffd700);
  border-color: white;
  transform: scale(1.1) rotate(15deg);
  box-shadow: 0 0 20px rgba(255, 193, 7, 0.7);
}

#weather-toggle-btn:active {
  transform: scale(0.95);
}

#weather-toggle-btn i {
  font-size: 1.1rem;
  color: white;
  text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

/* 移動端調整 */
@media (max-width: 768px) {
  #weather-toggle-btn {
    width: 32px !important;
    height: 32px !important;
    margin-left: 0.5rem !important;
  }
  
  #weather-toggle-btn i {
    font-size: 1rem;
  }
  
  .navbar-brand {
    font-size: 1.3rem;
  }
  
  .main-content {
    padding-top: 56px;
  }
}

/* Mobile overlay menu - 最終修正版 */
@media (max-width: 991.98px) {
  .navbar-collapse {
    position: fixed;
    top: 60px;
    left: 0;
    width: 100%;
    height: calc(100% - 60px);
    background: linear-gradient(135deg, #1a73e8, #0d47a1);
    padding: 1.5rem;
    overflow-y: auto;
    z-index: 9998;
    transform: translateY(-100%);
    transition: transform 0.3s ease-in-out;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
  }
  
  .navbar-collapse.show {
    transform: translateY(0);
  }
  
  .navbar-nav .nav-link {
    color: #fff;
    font-size: 1.15rem;
    margin: 0.6rem 0;
    padding: 0.8rem 1rem;
    border-radius: 12px;
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
  }
  
  .navbar-nav .nav-link.active {
    background-color: rgba(255,255,255,0.25);
    border-color: rgba(255,255,255,0.4);
  }
  
  .navbar-nav .nav-link:hover {
    background-color: rgba(255,255,255,0.2);
    transform: translateX(5px);
  }
}

@media (min-width: 992px) {
  .navbar-collapse {
    position: static !important;
    transform: none !important;
    height: auto;
    background: transparent;
    padding: 0;
  }
}

/* ========================= */
/* 加強版加載器樣式 */
/* ========================= */
#loader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgba(26,115,232,0.95), rgba(66,133,244,0.95));
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 10000 !important;
  flex-direction: column;
  transition: opacity 0.5s ease-out;
  backdrop-filter: blur(10px);
}

.spinner {
  width: 60px;
  height: 60px;
  border: 5px solid rgba(255, 255, 255, 0.3);
  border-radius: 50%;
  position: relative;
  animation: spin 1.2s linear infinite;
  margin-bottom: 1.5rem;
  box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
}

.spinner::before {
  content: '';
  position: absolute;
  top: -5px;
  left: -5px;
  right: -5px;
  bottom: -5px;
  border-radius: 50%;
  background: conic-gradient(
    from 0deg,
    #ff6f61,
    #6bc4e8,
    #feca57,
    #ff9ff3,
    #ff6f61
  );
  z-index: -1;
  animation: pulse 2s ease-in-out infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@keyframes pulse {
  0%, 100% { 
    opacity: 0.8;
    transform: scale(0.95);
  }
  50% { 
    opacity: 1;
    transform: scale(1.05);
  }
}

.loader-text {
  font-size: 1.2rem;
  font-weight: 600;
  color: white;
  letter-spacing: 1px;
  animation: textFade 2s ease-in-out infinite;
  text-shadow: 0 2px 4px rgba(0,0,0,0.3);
  background: rgba(255, 255, 255, 0.1);
  padding: 10px 20px;
  border-radius: 50px;
  backdrop-filter: blur(5px);
}

@keyframes textFade {
  0%, 100% { 
    opacity: 0.8;
    transform: translateY(0);
  }
  50% { 
    opacity: 1;
    transform: translateY(-5px);
  }
}

.loader-subtext {
  font-size: 0.9rem;
  color: rgba(255, 255, 255, 0.8);
  margin-top: 10px;
  font-weight: 500;
}

/* Error message */
#error-message {
  display: none;
  text-align: center;
  color: #ff6f61;
  font-size: 1rem;
  font-weight: 500;
  margin: 1rem;
  padding: 0.75rem;
  background: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

/* Container */
.container-fluid {
  max-width: 1400px;
  padding-left: 0;
  padding-right: 0;
}

/* Table - 表格容器 */
#table {
  margin: 0;
  overflow-x: auto;
  border-radius: 0;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  background: #fff;
  will-change: contents;
  transition: opacity 0.1s ease;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
}

#table table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  margin: 0;
}
#table table th, #table table td {
  padding: 1rem;
  border-bottom: 1px solid #d1d5db;
  text-align: center;
  font-size: 1rem;
}
#table table th {
  background: #f1f5f9;
  font-weight: 600;
  color: #2d2d2d;
  font-size: 0.9rem;
  letter-spacing: 0.3px;
}
#table table td {
  color: #374151;
}
#table table tr:hover {
  background-color: #e0f2fe;
  transition: background-color 0.2s ease;
}
#table table tr:last-child td {
  border-bottom: none;
}
#table-buffer {
  position: absolute;
  visibility: hidden;
  pointer-events: none;
}

/* iOS-specific adjustments */
@media only screen and (-webkit-min-device-pixel-ratio: 1) {
  #table table th {
    font-size: 0.85rem;
    padding: 0.8rem;
  }
}

/* ========================= */
/* 加強版天氣模態框樣式 */
/* ========================= */
#weatherModal {
  z-index: 99999 !important;
}

#weatherModal .modal-dialog {
  z-index: 100000 !important;
  max-width: 700px;
}

#weatherModal .modal-content {
  z-index: 100001 !important;
  border-radius: 24px;
  border: 4px solid rgba(255, 255, 255, 0.3);
  background: linear-gradient(145deg, rgba(26, 35, 126, 0.95), rgba(39, 60, 117, 0.95));
  color: white;
  box-shadow: 
    0 25px 50px -12px rgba(0, 0, 0, 0.5),
    0 0 30px rgba(255, 255, 255, 0.1),
    inset 0 1px 0 rgba(255, 255, 255, 0.2);
  overflow: hidden;
  backdrop-filter: blur(20px);
  position: relative;
}

#weatherModal .modal-content::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: 
    radial-gradient(circle at 20% 80%, rgba(255, 107, 107, 0.15) 0%, transparent 50%),
    radial-gradient(circle at 80% 20%, rgba(78, 205, 196, 0.15) 0%, transparent 50%);
  pointer-events: none;
}

#weatherModal .modal-header {
  border-bottom: 2px solid rgba(255, 255, 255, 0.2);
  background: rgba(0, 0, 0, 0.2);
  padding: 1.5rem 1.5rem 1rem;
  position: relative;
}

#weatherModal .modal-header::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 5%;
  width: 90%;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
}

#weatherModal .modal-title {
  font-weight: 800;
  font-size: 1.8rem;
  display: flex;
  align-items: center;
  gap: 12px;
  text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

#weatherModal .modal-body {
  padding: 2rem 1.5rem 1.5rem;
}

#weatherModal .modal-footer {
  border-top: 1px solid rgba(255, 255, 255, 0.15);
  background: rgba(0, 0, 0, 0.25);
  padding: 1rem 1.5rem;
  font-size: 0.85rem;
  color: rgba(255,255,255,0.8);
}

/* 溫度展示區域 */
.weather-temp-container {
  text-align: center;
  margin-bottom: 1.5rem;
  padding: 1.5rem;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 16px;
  border: 2px solid rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
}

.weather-temp {
  font-size: 4.5rem;
  font-weight: 900;
  line-height: 1;
  margin-bottom: 0.5rem;
  background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
  -webkit-background-clip: text;
  background-clip: text;
  color: transparent;
  text-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.weather-place {
  font-size: 1.4rem;
  font-weight: 600;
  color: #bbdefb;
  margin-bottom: 0.5rem;
}

.weather-time {
  font-size: 0.95rem;
  color: #90caf9;
  opacity: 0.9;
}

/* 行事曆容器 */
.calendar-container {
    margin: 1.5rem 0;
    max-height: 300px;
    overflow-y: auto;
    padding-right: 5px;
}

/* 自定義滾動條 */
.calendar-container::-webkit-scrollbar {
    width: 6px;
}

.calendar-container::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

.calendar-container::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
}

.calendar-container::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}

/* 行事曆項目 */
.calendar-item {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 12px;
    padding: 1rem;
    margin-bottom: 0.8rem;
    border-left: 4px solid;
    transition: transform 0.2s ease, background 0.2s ease;
}

.calendar-item:hover {
    transform: translateX(5px);
    background: rgba(255, 255, 255, 0.12);
}

.calendar-item.today {
    border-left-color: #4fc3f7;
    background: rgba(79, 195, 247, 0.15);
}

.calendar-item.tomorrow {
    border-left-color: #ffb74d;
}

.calendar-item.other {
    border-left-color: #ba68c8;
}

.calendar-date {
    font-size: 0.9rem;
    color: #90caf9;
    margin-bottom: 0.3rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.calendar-date i {
    font-size: 1rem;
}

.calendar-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #fff;
    margin-bottom: 0.3rem;
}

.calendar-title .en {
    color: #bbdefb;
    font-size: 0.9rem;
    font-weight: 400;
    margin-top: 2px;
}

.calendar-desc {
    font-size: 0.9rem;
    color: #e3f2fd;
    opacity: 0.9;
    line-height: 1.4;
}

.calendar-location {
    font-size: 0.85rem;
    color: #bbdefb;
    margin-top: 0.3rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.calendar-location i {
    font-size: 0.9rem;
}

/* 翻譯標記 */
.translation-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 4px;
    padding: 2px 6px;
    font-size: 0.7rem;
    margin-left: 8px;
    color: #90caf9;
}

/* 天氣資訊區塊 */
.weather-section {
  margin-bottom: 1.2rem;
  padding: 1.2rem;
  background: rgba(255, 255, 255, 0.08);
  border-radius: 14px;
  border-left: 4px solid;
  transition: transform 0.3s ease, background 0.3s ease;
}

.weather-section:hover {
  transform: translateY(-3px);
  background: rgba(255, 255, 255, 0.12);
}

.weather-section:nth-child(1) { border-left-color: #4fc3f7; } /* 概況 */
.weather-section:nth-child(2) { border-left-color: #ffb74d; } /* 預報 */
.weather-section:nth-child(3) { border-left-color: #ba68c8; } /* 展望 */
.weather-section:nth-child(4) { border-left-color: #4dd0e1; } /* 行事曆標題 */

.weather-section-title {
  font-weight: 700;
  font-size: 1.1rem;
  margin-bottom: 0.8rem;
  display: flex;
  align-items: center;
  gap: 10px;
  color: #e3f2fd;
}

.weather-section-content {
  font-size: 0.95rem;
  line-height: 1.5;
  color: #e3f2fd;
  opacity: 0.95;
}

.weather-icon {
  font-size: 1.3rem;
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.15);
  border-radius: 10px;
}

.btn-close-white {
  filter: invert(1) grayscale(100%) brightness(200%);
  opacity: 0.8;
}

.btn-close-white:hover {
  opacity: 1;
}

.weather-header-icon {
  font-size: 2.2rem;
  color: #ffd54f;
  animation: float 3s ease-in-out infinite;
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-5px); }
}

/* 響應式調整 */
@media (max-width: 768px) {
  .weather-temp {
    font-size: 3.5rem;
  }
  
  #weatherModal .modal-dialog {
    margin: 1rem;
  }
  
  .weather-section {
    padding: 1rem;
  }

  .calendar-container {
    max-height: 250px;
  }
}

/* ========================= */
/* 分區天氣按鈕樣式 */
/* ========================= */
#district-weather-btn {
  border: 2px solid rgba(255, 255, 255, 0.3);
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #36d1dc, #5b86e5);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

#district-weather-btn:hover {
  background: linear-gradient(135deg, #5b86e5, #36d1dc);
  border-color: white;
  transform: scale(1.1) rotate(-15deg);
  box-shadow: 0 0 20px rgba(86, 207, 225, 0.7);
}

#district-weather-btn:active {
  transform: scale(0.95);
}

#district-weather-btn i {
  font-size: 1.1rem;
  color: white;
  text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

/* 移動端調整 */
@media (max-width: 768px) {
  #district-weather-btn {
    width: 32px !important;
    height: 32px !important;
    margin-left: 0.3rem !important;
  }
  
  #district-weather-btn i {
    font-size: 1rem;
  }
}

/* ========================= */
/* iOS安全區域特別處理 */
/* ========================= */
@supports (padding-top: env(safe-area-inset-top)) {
  .navbar {
    padding-top: calc(0.75rem + env(safe-area-inset-top, 0px)) !important;
    height: calc(60px + env(safe-area-inset-top, 0px)) !important;
  }
  
  .main-content {
    padding-top: calc(60px + env(safe-area-inset-top, 0px));
  }
  
  @media (max-width: 991.98px) {
    .navbar-collapse {
      top: calc(60px + env(safe-area-inset-top, 0px));
      height: calc(100% - 60px - env(safe-area-inset-top, 0px));
    }
  }
}

/* ========================= */
/* PWA模式特殊處理 - 最終版 */
/* ========================= */
@media (display-mode: standalone) {
  .navbar {
    top: 0 !important;
  }
  
  .main-content {
    padding-top: calc(60px + env(safe-area-inset-top, 0px));
  }
  
  @media (max-width: 991.98px) {
    .navbar-collapse {
      top: calc(60px + env(safe-area-inset-top, 0px));
      height: calc(100% - 60px - env(safe-area-inset-top, 0px));
    }
    
    /* 確保 menu 唔會遮擋內容 */
    .navbar-collapse.show ~ .main-content {
      opacity: 0.3;
      pointer-events: none;
    }
  }
  
  #weatherModal .modal-dialog {
    margin-top: calc(60px + env(safe-area-inset-top, 0px) + 1rem) !important;
  }
}
</style>

<title>輕鐵實時訊息</title>
</head>
<body>
<!-- PWA狀態欄 - 完全禁用 -->
<div id="pwa-status-bar" style="display: none !important;">
    <div id="pwa-status-bar-content">
        <span id="pwa-time">--:--</span>
        <span style="margin: 0 5px">•</span>
        <span id="pwa-battery">100%</span>
    </div>
</div>

<!-- Loader -->
<div id="loader">
  <div class="spinner"></div>
  <div class="loader-text">輕鐵數據載入中…</div>
  <div class="loader-subtext">請稍候</div>
</div>

<!-- 頁面容器 -->
<div class="page-container">
  <!-- Navbar - 固定在頂部 -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <?php 
      $station_name_raw = $_GET['name'] ?? "大興(南)";
      $station_name = urldecode($station_name_raw);
      
      $valid_stations = [
          "大興(南)", "兆康", "屯門", "市中心", "安定", 
          "澤豐", "河田", "水邊圍", "豐年路", "康樂路", 
          "大棠路", "元朗", "天水圍", "天瑞", "天富", "頌富"
      ];
      
      if (!in_array($station_name, $valid_stations)) {
          $station_name = "大興(南)";
      }
      
      $station_name_safe = htmlspecialchars($station_name, ENT_QUOTES, 'UTF-8');
      
      $station_id = $_GET['id'] ?? "220";
      if (!preg_match('/^\d{2,3}$/', $station_id)) {
          $station_id = "220";
      }
      $station_id_safe = htmlspecialchars($station_id, ENT_QUOTES, 'UTF-8');
      ?>
      <a class="navbar-brand" href="./">
        輕鐵 - <span id="station-name"><?php echo $station_name_safe; ?></span>
          <button id="district-weather-btn" class="btn btn-sm ms-1 p-1" style="border-radius: 50%; width: 36px; height: 36px;" title="查詢我所在分區的天氣">
              <i class="bi bi-sun"></i>
          </button>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="geolocation" data-name="使用我的位置">使用我的位置</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="220" data-name="大興(南)">大興(南)</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="100" data-name="兆康">兆康</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="295" data-name="屯門">屯門</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="280" data-name="市中心">市中心</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="270" data-name="安定">安定</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="080" data-name="澤豐">澤豐</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="070" data-name="河田">河田</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="560" data-name="水邊圍">水邊圍</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="570" data-name="豐年路">豐年路</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="580" data-name="康樂路">康樂路</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="590" data-name="大棠路">大棠路</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="600" data-name="元朗">元朗</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="430" data-name="天水圍">天水圍</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="460" data-name="天瑞">天瑞</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="480" data-name="天富">天富</a></li>
          <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-id="468" data-name="頌富">頌富</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 主要內容區域 - 從導航欄下方開始 -->
  <div class="main-content">
    <!-- Error message -->
    <div id="error-message">無法載入輕鐵數據，請稍後再試！</div>

    <!-- Table containers -->
    <div id="table"></div>
    <div id="table-buffer"></div>
  </div>
</div>

<!-- ========================= -->
<!-- 天氣模態框 HTML -->
<!-- ========================= -->
<div class="modal fade" id="weatherModal" tabindex="-1" aria-labelledby="weatherModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="weatherModalLabel">
          <span class="weather-header-icon">☀️</span>
          天氣資訊 + 百周年行事曆
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- 溫度顯示 -->
        <div class="weather-temp-container">
          <div class="weather-temp">
            <span id="temperatureValue">--</span><span>°C</span>
          </div>
          <div class="weather-place" id="temperaturePlace">--</div>
          <div class="weather-time" id="temperatureTime">更新時間：載入中...</div>
        </div>
        
        <!-- 百周年未來三日事項 -->
        <div class="weather-section" style="border-left-color: #4dd0e1;">
          <div class="weather-section-title">
            <span class="weather-icon">📅</span>
            <span>百周年未來三日事項</span>
          </div>
          <div class="weather-section-content">
            <div class="calendar-container" id="calendar-container">
              <div class="text-center py-3">
                <div class="spinner-border spinner-border-sm text-light me-2"></div>
                載入行事曆...
              </div>
            </div>
            <div id="calendarNoDataMessage" style="text-align:center; padding: 10px; display: none; color: #ffb74d;">
              <i class="bi bi-calendar-x"></i> 暫無行事曆資料
            </div>
          </div>
        </div>

        <!-- 天氣概況區塊 -->
        <div class="weather-section">
          <div class="weather-section-title">
            <span class="weather-icon">📋</span>
            <span>天氣概況</span>
          </div>
          <div class="weather-section-content" id="weatherGeneral">
            載入天氣概況中...
          </div>
        </div>
        
        <div class="weather-section">
          <div class="weather-section-title">
            <span class="weather-icon">⏳</span>
            <span>下午及今晚預報</span>
          </div>
          <div class="weather-section-content" id="weatherForecast">
            載入詳細預報中...
          </div>
        </div>
        
        <div class="weather-section">
          <div class="weather-section-title">
            <span class="weather-icon">🔮</span>
            <span>未來展望</span>
          </div>
          <div class="weather-section-content" id="weatherOutlook">
            載入未來展望中...
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="w-100 text-center">
          <small id="weatherFooterText">數據來源：香港天文台</small>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ==============================
// PWA狀態欄管理 - 完全禁用
// ==============================
(function() {
    'use strict';
    
    const statusBar = document.getElementById('pwa-status-bar');
    if (statusBar) {
        statusBar.style.display = 'none';
        statusBar.style.height = '0';
        statusBar.style.paddingTop = '0';
    }
    
    document.body.style.paddingTop = '0';
})();

// ==============================
// 全域變數
// ==============================
let weatherModalAutoHideTimer = null;
let weatherModalScrollTimer = null;
let isUserScrolling = false;
let currentWeatherModal = null;
let lastRefreshTime = 0;
let deferredPrompt;
let userGlobalPosition = null;
let positionTimestamp = 0;
let lrtLocationReady = false;
let lrtLocationPromise = null;
let tableCache = { id: null, tableData: null, systemTime: '', timestamp: 0 };
const cacheDuration = 5000;
let lastPosition = null;
let manualSelection = false;
let newServiceWorker = null;
let swRegistration = null;

// ==============================
// 翻譯詞典 (完整版)
// ==============================
const translationDict = {
    'January': '一月', 'February': '二月', 'March': '三月', 'April': '四月',
    'May': '五月', 'June': '六月', 'July': '七月', 'August': '八月',
    'September': '九月', 'October': '十月', 'November': '十一月', 'December': '十二月',
    
    'Monday': '星期一', 'Tuesday': '星期二', 'Wednesday': '星期三', 'Thursday': '星期四',
    'Friday': '星期五', 'Saturday': '星期六', 'Sunday': '星期日',
    'Mon': '一', 'Tue': '二', 'Wed': '三', 'Thu': '四', 'Fri': '五', 'Sat': '六', 'Sun': '日',
    
    'Day': '日', 'Parents': '家長', 'Days': '日', 'Parents’ Days': '家長日',
    'Interim Prize-giving Ceremony': '中期頒獎典禮', 'Prize-giving': '頒獎', 'Ceremony': '典禮',
    'PLK Inter-schools Athletics Meet': '保良局校際田徑比賽', 'Athletics': '田徑', 'Meet': '比賽',
    'Swimming Gala': '游泳比賽', 'Gala': '比賽', 'PLK Inter-school Swimming Gala': '保良局校際游泳比賽',
    'After': '後', 'Day after': '翌日', 'Day after Parents’ Days': '家長日翌日',
    'Study Leave': '溫習假', 'Commence': '開始', 'F.6 Study Leave Commence': '中六溫習假開始',
    'F.6 Mock Examination': '中六模擬考試', 'Mock': '模擬', 'Examination': '考試', 'Exam': '考試',
    '1st Examination': '第一次考試', '2nd Examination': '第二次考試',
    '1st Uniform Test': '第一次統一測驗', '2nd Uniform Test': '第二次統一測驗',
    'Uniform Test': '統一測驗', 'Test': '測驗',
    'Staff Development Day': '教職員發展日', 'Staff': '教職員', 'Development': '發展',
    'Global Study Week': '環球學習週', 'Global': '環球', 'Study': '學習', 'Week': '週',
    'Incl. Fun Day': '含趣味日', 'Fun Day': '趣味日', 'Reading Week': '閱讀週', 'Reading': '閱讀',
    'TSA': '全港性系統評估', 'Speaking': '說話', 'Written': '筆試', 'Fallback day': '後備日',
    'SSPA DP Interview': '中學學位分配面試', 'SSPA': '中學學位分配', 'DP': '自行分配學位', 'Interview': '面試',
    'Homecoming Day': '返校日', 'Homecoming': '返校',
    'PTA AGM cum F.1 Parents’ Day': '家教會週年大會暨中一家長日', 'PTA': '家教會', 'AGM': '週年大會', 'cum': '暨',
    'Information Day': '資訊日', 'Information': '資訊',
    'Class Photo-taking': '班級拍照', 'Photo-taking': '拍照',
    'Talent Quest': '才藝比賽', 'Talent': '才藝', 'Quest': '比賽',
    'Graduation Day': '畢業典禮', 'Graduation': '畢業',
    'Chinese Culture Week': '中華文化週', 'Chinese': '中華', 'Culture': '文化',
    'Inter-house Music Festival': '社際音樂節', 'Inter-house': '社際', 'Music': '音樂', 'Festival': '節',
    'Post Examination Activity Period': '考試後活動時段', 'Post Examination': '考試後', 'Activity': '活動', 'Period': '時段',
    'School Closing Ceremony': '散學典禮', 'Closing': '散學',
    'Registration of Students': '學生註冊', 'Registration': '註冊', 'Students': '學生',
    'Release of HKDSE Results': '中學文憑試放榜', 'Release': '公佈', 'HKDSE': '文憑試', 'Results': '成績',
    'Summer Vacation': '暑假', 'Summer': '夏季', 'Vacation': '假期',
    'Supplementary Classes': '補課', 'Supplementary': '補充', 'Classes': '課堂',
    'Remedial Classes': '輔導班', 'Remedial': '輔導',
    'School Commencement Ceremony': '開學典禮', 'Commencement': '開學',
    'Class Affairs': '班務', 'Affairs': '事務',
    'Normal Lessons': '正常上課', 'Normal': '正常', 'Lessons': '課堂',
    'Special Timetable': '特別時間表', 'Timetable': '時間表',
    
    'Lunar New Year Holiday': '農曆新年假期', 'Lunar': '農曆', 'New Year': '新年', 'Holiday': '假期',
    'Easter Holidays': '復活節假期', 'Easter': '復活節',
    'Ching Ming Festival': '清明節', 'Ching Ming': '清明',
    'Labour Day': '勞動節', 'Labour': '勞動',
    'Buddha’s Birthday': '佛誕', 'Buddha': '佛', 'Birthday': '誕',
    'Tuen Ng Festival': '端午節', 'Tuen Ng': '端午',
    'National Day': '國慶日', 'National': '國慶',
    'Chung Yeung Festival': '重陽節', 'Chung Yeung': '重陽',
    'Christmas': '聖誕', 'Christmas & New Year Holidays': '聖誕及新年假期',
    
    'AM': '上午', 'PM': '下午', 'Incl.': '含', 'Fallback': '後備'
};

function translateText(text) {
    if (!text || text.trim() === '') return text;
    
    if (translationDict[text]) {
        return translationDict[text];
    }
    
    let translated = text;
    const words = text.split(/(\s+|[-,.&()])/);
    
    for (let i = 0; i < words.length; i++) {
        const word = words[i].trim();
        if (word && translationDict[word]) {
            words[i] = translationDict[word];
        }
    }
    
    translated = words.join('');
    
    if (translated === text) return text;
    return translated;
}

// ==============================
// PWA安裝提示
// ==============================
window.addEventListener('beforeinstallprompt', (e) => {
  e.preventDefault();
  deferredPrompt = e;
  showInstallButton();
});

function showInstallButton() {
  const installBtn = document.createElement('button');
  installBtn.innerHTML = '📱 安裝App';
  installBtn.style.cssText = `
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #1a73e8;
    color: white;
    border: none;
    border-radius: 25px;
    padding: 10px 20px;
    font-size: 14px;
    z-index: 10000;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  `;
  
  installBtn.addEventListener('click', async () => {
    if (deferredPrompt) {
      deferredPrompt.prompt();
      const { outcome } = await deferredPrompt.userChoice;
      console.log(`用戶選擇: ${outcome}`);
      deferredPrompt = null;
      installBtn.remove();
    }
  });
  
  document.body.appendChild(installBtn);
  
  setTimeout(() => installBtn.remove(), 7 * 24 * 60 * 60 * 1000);
}

// ==============================
// ICS 行事曆讀取函數
// ==============================
async function fetchCalendarEvents() {
    console.log('📅 嘗試讀取行事曆...');
    
    try {
        const response = await fetch('calendar.ics?_=' + Date.now());
        
        if (!response.ok) {
            console.log('⚠️ 找不到 calendar.ics 檔案');
            return [];
        }
        
        const icsText = await response.text();
        console.log('✅ 成功讀取 ICS 檔案');
        
        const events = parseICS(icsText);
        console.log(`📊 解析到 ${events.length} 個事件`);
        
        return events;
        
    } catch (error) {
        console.error('❌ 讀取行事曆失敗:', error);
        return [];
    }
}

function parseICS(icsText) {
    const events = [];
    const lines = icsText.split('\n');
    
    let currentEvent = null;
    let inEvent = false;
    
    for (let i = 0; i < lines.length; i++) {
        let line = lines[i].trim();
        
        if (!line) continue;
        
        while (i + 1 < lines.length && (lines[i + 1].startsWith(' ') || lines[i + 1].startsWith('\t'))) {
            line += lines[i + 1].trim();
            i++;
        }
        
        if (line === 'BEGIN:VEVENT') {
            inEvent = true;
            currentEvent = {
                summary: '',
                summary_en: '',
                description: '',
                location: '',
                dtstart: null,
                dtend: null
            };
            continue;
        }
        
        if (line === 'END:VEVENT') {
            if (currentEvent && currentEvent.dtstart) {
                currentEvent.summary_en = currentEvent.summary;
                currentEvent.summary = translateText(currentEvent.summary);
                
                if (currentEvent.location) {
                    currentEvent.location = translateText(currentEvent.location);
                }
                
                events.push(currentEvent);
            }
            inEvent = false;
            currentEvent = null;
            continue;
        }
        
        if (!inEvent || !currentEvent) continue;
        
        if (line.startsWith('SUMMARY:')) {
            currentEvent.summary = line.substring(8).replace(/\\,/g, ',').replace(/\\n/g, ' ').replace(/\\/g, '');
        }
        else if (line.startsWith('LOCATION:')) {
            currentEvent.location = line.substring(9).replace(/\\,/g, ',').replace(/\\n/g, ' ').replace(/\\/g, '');
        }
        else if (line.startsWith('DESCRIPTION:')) {
            currentEvent.description = line.substring(12).replace(/\\n/g, '\n').replace(/\\,/g, ',').replace(/\\/g, '');
        }
        else if (line.startsWith('DTSTART;VALUE=DATE:')) {
            const dateStr = line.substring(19).trim();
            if (dateStr && dateStr.length === 8) {
                const year = parseInt(dateStr.substring(0, 4));
                const month = parseInt(dateStr.substring(4, 6)) - 1;
                const day = parseInt(dateStr.substring(6, 8));
                currentEvent.dtstart = new Date(year, month, day);
                currentEvent.dtstart.setHours(0, 0, 0, 0);
            }
        }
        else if (line.startsWith('DTEND;VALUE=DATE:')) {
            const dateStr = line.substring(17).trim();
            if (dateStr && dateStr.length === 8) {
                const year = parseInt(dateStr.substring(0, 4));
                const month = parseInt(dateStr.substring(4, 6)) - 1;
                const day = parseInt(dateStr.substring(6, 8));
                currentEvent.dtend = new Date(year, month, day);
                currentEvent.dtend.setHours(0, 0, 0, 0);
            }
        }
    }
    
    return events;
}

function formatEventDate(date) {
    const now = new Date();
    const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    const eventDate = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    
    const diffDays = Math.floor((eventDate - today) / (1000 * 60 * 60 * 24));
    
    if (diffDays === 0) return '今天';
    if (diffDays === 1) return '明天';
    if (diffDays === 2) return '後天';
    
    const weekdays = ['日', '一', '二', '三', '四', '五', '六'];
    return `${date.getMonth() + 1}/${date.getDate()} (${weekdays[date.getDay()]})`;
}

function getEventClass(eventDate) {
    const now = new Date();
    const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
    const eventDay = new Date(eventDate.getFullYear(), eventDate.getMonth(), eventDate.getDate());
    
    const diffDays = Math.floor((eventDay - today) / (1000 * 60 * 60 * 24));
    
    if (diffDays === 0) return 'today';
    if (diffDays === 1) return 'tomorrow';
    return 'other';
}

async function displayCalendar() {
    const container = document.getElementById('calendar-container');
    const noDataMsg = document.getElementById('calendarNoDataMessage');
    
    try {
        const events = await fetchCalendarEvents();
        
        if (!events || events.length === 0) {
            console.log('📅 沒有行事曆事件');
            container.innerHTML = '';
            noDataMsg.style.display = 'block';
            return;
        }
        
        const now = new Date();
        const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
        const threeDaysLater = new Date(today);
        threeDaysLater.setDate(today.getDate() + 3);
        
        console.log('📅 今日日期:', today.toLocaleDateString('zh-HK'));
        console.log('📅 三日後:', threeDaysLater.toLocaleDateString('zh-HK'));
        
        const upcomingEvents = [];
        
        events.forEach(event => {
            if (!event.dtstart) return;
            
            const eventStart = new Date(event.dtstart);
            eventStart.setHours(0, 0, 0, 0);
            
            let eventEnd = null;
            if (event.dtend) {
                eventEnd = new Date(event.dtend);
                eventEnd.setHours(0, 0, 0, 0);
                eventEnd.setDate(eventEnd.getDate() - 1);
            } else {
                eventEnd = new Date(eventStart);
            }
            
            const eventOverlaps = eventEnd >= today && eventStart <= threeDaysLater;
            
            if (eventOverlaps) {
                const eventCopy = { ...event };
                
                const displayStart = eventStart < today ? today : eventStart;
                const displayEnd = eventEnd > threeDaysLater ? threeDaysLater : eventEnd;
                
                eventCopy.displayStart = displayStart;
                eventCopy.displayEnd = displayEnd;
                
                upcomingEvents.push(eventCopy);
            }
        });
        
        upcomingEvents.sort((a, b) => a.displayStart - b.displayStart);
        
        console.log(`📅 找到 ${upcomingEvents.length} 個在未來三天內發生的事件`);
        
        if (upcomingEvents.length === 0) {
            container.innerHTML = '<div class="text-center py-3" style="color: #90caf9;">未來三天沒有安排事項</div>';
            noDataMsg.style.display = 'none';
            return;
        }
        
        let html = '';
        upcomingEvents.forEach(event => {
            const eventClass = getEventClass(event.displayStart);
            const dateStr = formatEventDate(event.displayStart);
            
            const isMultiDay = event.displayEnd && event.displayEnd > event.displayStart;
            
            let timeStr = '全日';
            if (isMultiDay) {
                const startDate = event.displayStart.toLocaleDateString('zh-HK', { month: 'numeric', day: 'numeric' });
                const endDate = event.displayEnd.toLocaleDateString('zh-HK', { month: 'numeric', day: 'numeric' });
                timeStr = `${startDate} - ${endDate}`;
            }
            
            const showOriginal = event.summary_en && event.summary_en !== event.summary;
            
            html += `
                <div class="calendar-item ${eventClass}">
                    <div class="calendar-date">
                        <i class="bi bi-calendar-event"></i>
                        ${dateStr} (${timeStr})
                    </div>
                    <div class="calendar-title">
                        ${event.summary || '未命名事件'}
                        ${showOriginal ? `<span class="translation-badge">EN: ${event.summary_en}</span>` : ''}
                    </div>
            `;
            
            if (event.description && event.description.trim() !== '') {
                const desc = event.description.replace(/\\n/g, '<br>');
                html += `<div class="calendar-desc">${desc}</div>`;
            }
            
            if (event.location && event.location.trim() !== '') {
                html += `
                    <div class="calendar-location">
                        <i class="bi bi-geo-alt"></i>
                        ${event.location}
                    </div>
                `;
            }
            
            html += `</div>`;
        });
        
        container.innerHTML = html;
        noDataMsg.style.display = 'none';
        
    } catch (error) {
        console.error('❌ 顯示行事曆失敗:', error);
        container.innerHTML = '<div class="text-center py-3" style="color: #ff6b6b;">無法載入行事曆</div>';
        noDataMsg.style.display = 'none';
    }
}

// ==============================
// 天氣功能
// ==============================
function setupModalAutoClose(modalElement) {
    const modalBody = modalElement.querySelector('.modal-body');
    const modalFooter = modalElement.querySelector('.modal-footer');
    const footerText = modalFooter.querySelector('#weatherFooterText');
    
    const updateFooterText = (text) => {
        footerText.textContent = text;
    };
    
    const resetAutoHideTimer = () => {
        if (weatherModalAutoHideTimer) {
            clearTimeout(weatherModalAutoHideTimer);
            weatherModalAutoHideTimer = null;
        }
        
        weatherModalAutoHideTimer = setTimeout(() => {
            if (currentWeatherModal) {
                currentWeatherModal.hide();
                console.log('✅ 天氣模態框已自動關閉');
            }
        }, 10000);
        
        updateFooterText('數據來源：香港天文台 • 10秒後自動關閉');
    };
    
    const handleScroll = () => {
        if (!isUserScrolling) {
            isUserScrolling = true;
            
            if (weatherModalAutoHideTimer) {
                clearTimeout(weatherModalAutoHideTimer);
                weatherModalAutoHideTimer = null;
            }
            
            updateFooterText('用戶正在閱讀，自動關閉已暫停...');
        }
        
        if (weatherModalScrollTimer) {
            clearTimeout(weatherModalScrollTimer);
        }
        
        weatherModalScrollTimer = setTimeout(() => {
            isUserScrolling = false;
            resetAutoHideTimer();
        }, 1000);
    };
    
    modalBody.addEventListener('scroll', handleScroll);
    
    modalElement.addEventListener('mouseenter', () => {
        if (weatherModalAutoHideTimer) {
            clearTimeout(weatherModalAutoHideTimer);
            weatherModalAutoHideTimer = null;
        }
        updateFooterText('鼠標懸停中，自動關閉已暫停');
    });
    
    modalElement.addEventListener('mouseleave', () => {
        if (!isUserScrolling) {
            resetAutoHideTimer();
        }
    });
    
    const cleanupModalEvents = () => {
        modalBody.removeEventListener('scroll', handleScroll);
        
        if (weatherModalAutoHideTimer) {
            clearTimeout(weatherModalAutoHideTimer);
            weatherModalAutoHideTimer = null;
        }
        if (weatherModalScrollTimer) {
            clearTimeout(weatherModalScrollTimer);
            weatherModalScrollTimer = null;
        }
        
        updateFooterText('數據來源：香港天文台');
        currentWeatherModal = null;
    };
    
    modalElement.addEventListener('hidden.bs.modal', cleanupModalEvents);
    
    resetAutoHideTimer();
}

async function showWeatherModal() {
    console.log('🌤️ 開始獲取天氣數據...');
    
    if (typeof bootstrap === 'undefined') {
        console.log('⏳ 等待Bootstrap加載...');
        setTimeout(showWeatherModal, 500);
        return;
    }
    
    if (weatherModalAutoHideTimer) {
        clearTimeout(weatherModalAutoHideTimer);
        weatherModalAutoHideTimer = null;
    }
    if (weatherModalScrollTimer) {
        clearTimeout(weatherModalScrollTimer);
        weatherModalScrollTimer = null;
    }
    
    isUserScrolling = false;
    
    document.getElementById('temperatureValue').textContent = '...';
    document.getElementById('weatherGeneral').textContent = '獲取數據中...';
    document.getElementById('weatherForecast').textContent = '請稍候...';
    document.getElementById('weatherOutlook').textContent = '載入中...';
    document.getElementById('temperatureTime').textContent = '更新時間：連接中...';
    document.getElementById('temperaturePlace').textContent = '屯門區';
    
    document.getElementById('calendar-container').innerHTML = '<div class="text-center py-3"><div class="spinner-border spinner-border-sm text-light me-2"></div>載入行事曆...</div>';
    document.getElementById('calendarNoDataMessage').style.display = 'none';
    
    try {
        const [currentData, forecastData] = await Promise.all([
            fetch(`https://data.weather.gov.hk/weatherAPI/opendata/weather.php?dataType=rhrread&lang=tc&_=${Date.now()}`).then(r => r.json()),
            fetch(`https://data.weather.gov.hk/weatherAPI/opendata/weather.php?dataType=flw&lang=tc&_=${Date.now()}`).then(r => r.json())
        ]);
        
        console.log('✅ 天氣數據獲取成功');
        
        displayCalendar();
        
        const tempData = currentData.temperature?.data || [];
        const tmuenTemp = tempData.find(item => item.place === '屯門');
        
        if (tmuenTemp) {
            document.getElementById('temperatureValue').textContent = tmuenTemp.value;
            console.log(`🌡️ 屯門溫度: ${tmuenTemp.value}°C`);
        } else {
            document.getElementById('temperatureValue').textContent = '--';
        }
        
        if (forecastData.generalSituation) {
            document.getElementById('weatherGeneral').textContent = forecastData.generalSituation;
        }
        
        if (forecastData.forecastDesc) {
            let forecastText = '';
            if (forecastData.forecastPeriod) {
                forecastText += `${forecastData.forecastPeriod}\n`;
            }
            forecastText += forecastData.forecastDesc;
            document.getElementById('weatherForecast').textContent = forecastText;
        }
        
        if (forecastData.outlook) {
            document.getElementById('weatherOutlook').textContent = forecastData.outlook;
        }
        
        if (forecastData.forecastMaxtemp && forecastData.forecastMintemp) {
            const tempRange = `\n\n📊 今日溫度：最高 ${forecastData.forecastMaxtemp}°C，最低 ${forecastData.forecastMintemp}°C`;
            document.getElementById('weatherGeneral').textContent += tempRange;
        }
        
        const updateTime = forecastData.updateTime || currentData.updateTime;
        if (updateTime) {
            try {
                const time = new Date(updateTime);
                const formattedTime = `${time.getFullYear()}-${(time.getMonth()+1).toString().padStart(2, '0')}-${time.getDate().toString().padStart(2, '0')} ${time.getHours().toString().padStart(2, '0')}:${time.getMinutes().toString().padStart(2, '0')}`;
                document.getElementById('temperatureTime').textContent = `更新時間：${formattedTime}`;
            } catch (e) {
                document.getElementById('temperatureTime').textContent = `更新時間：${updateTime}`;
            }
        }
        
        const modalElement = document.getElementById('weatherModal');
        
        if (currentWeatherModal) {
            currentWeatherModal.hide();
        }
        
        currentWeatherModal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',
            keyboard: false
        });
        
        currentWeatherModal.show();
        console.log('✅ 天氣模態框已顯示');
        
        setupModalAutoClose(modalElement);
        
    } catch (error) {
        console.error('❌ 獲取天氣數據失敗:', error);
        
        document.getElementById('temperatureValue').textContent = '錯誤';
        document.getElementById('weatherGeneral').textContent = '無法連接天氣伺服器';
        document.getElementById('weatherForecast').textContent = '請檢查網絡連接或稍後再試';
        document.getElementById('weatherOutlook').textContent = '服務暫時不可用';
        document.getElementById('temperatureTime').textContent = '更新時間：失敗';
        
        displayCalendar();
        
        const modalElement = document.getElementById('weatherModal');
        const weatherModal = new bootstrap.Modal(modalElement);
        weatherModal.show();
        
        setTimeout(() => {
            if (weatherModal) {
                weatherModal.hide();
            }
        }, 3000);
    }
}

function showFixedWeatherModal() {
    console.log('🏠 顯示固定天氣（屯門區）');
    
    document.getElementById('temperaturePlace').textContent = '屯門區';
    
    const modalElement = document.getElementById('weatherModal');
    const modalTitle = modalElement.querySelector('.modal-title');
    modalTitle.innerHTML = `
        <span class="weather-header-icon">🏠</span>
        屯門區天氣資訊
    `;
    
    if (currentWeatherModal) {
        currentWeatherModal.hide();
    }
    
    currentWeatherModal = new bootstrap.Modal(modalElement, {
        backdrop: 'static',
        keyboard: false
    });
    
    currentWeatherModal.show();
    console.log('✅ 天氣模態框已顯示');
    
    showWeatherModal();
}

async function showDistrictWeatherModal(useCachedPosition = true) {
    console.log('📍 分區天氣功能啟動...');
    
    if (typeof bootstrap === 'undefined') {
        setTimeout(() => showDistrictWeatherModal(true), 3000);
        return;
    }
    
    if (weatherModalAutoHideTimer) {
        clearTimeout(weatherModalAutoHideTimer);
        weatherModalAutoHideTimer = null;
    }
    if (weatherModalScrollTimer) {
        clearTimeout(weatherModalScrollTimer);
        weatherModalScrollTimer = null;
    }
    
    isUserScrolling = false;
    
    document.getElementById('temperatureValue').textContent = '...';
    document.getElementById('weatherGeneral').innerHTML = '<div class="text-center"><div class="spinner-border spinner-border-sm text-light me-2"></div>準備天氣數據...</div>';
    document.getElementById('weatherForecast').textContent = '正在準備...';
    document.getElementById('weatherOutlook').textContent = '載入中...';
    document.getElementById('temperaturePlace').textContent = '準備中...';
    document.getElementById('temperatureTime').textContent = '更新時間：--';
    
    document.getElementById('calendar-container').innerHTML = '<div class="text-center py-3"><div class="spinner-border spinner-border-sm text-light me-2"></div>載入行事曆...</div>';
    document.getElementById('calendarNoDataMessage').style.display = 'none';
    
    let userLat, userLng, locationSource = '未知';
    
    try {
        if (useCachedPosition && userGlobalPosition && 
            (Date.now() - positionTimestamp) < 30000) {
            
            console.log('✅ 重用現有位置數據');
            userLat = userGlobalPosition.latitude;
            userLng = userGlobalPosition.longitude;
            locationSource = '重用輕鐵定位';
            
            document.getElementById('weatherGeneral').innerHTML = 
                '<div class="text-center"><div class="spinner-border spinner-border-sm text-light me-2"></div>使用已保存位置...</div>';
            
        } else {
            console.log('🔄 需要重新獲取位置');
            
            document.getElementById('weatherGeneral').innerHTML = 
                '<div class="text-center"><div class="spinner-border spinner-border-sm text-warning me-2"></div>請求位置權限中...</div>';
            
            const position = await new Promise((resolve, reject) => {
                navigator.geolocation.getCurrentPosition(
                    resolve, 
                    (error) => {
                        console.error('定位錯誤代碼:', error.code, '信息:', error.message);
                        reject(error);
                    }, 
                    { 
                        timeout: 8000,
                        maximumAge: 0,
                        enableHighAccuracy: false 
                    }
                );
            });
            
            userLat = position.coords.latitude;
            userLng = position.coords.longitude;
            locationSource = '新定位';
            
            saveUserPosition(position.coords);
            console.log(`✅ 新位置獲取成功: ${userLat.toFixed(6)}, ${userLng.toFixed(6)}`);
        }
        
        document.getElementById('weatherGeneral').innerHTML = 
            '<div class="text-center"><div class="spinner-border spinner-border-sm text-info me-2"></div>分析所在區域...</div>';
        
        const nearestDistrict = findNearestDistrict(userLat, userLng);
        const stationInfo = WEATHER_STATIONS[nearestDistrict];
        const districtDesc = DISTRICT_DESCRIPTIONS[nearestDistrict] || nearestDistrict;
        
        console.log(`🗺️ 最近分區: ${nearestDistrict}, 氣象站: ${stationInfo.name}`);
        
        document.getElementById('weatherGeneral').innerHTML = 
            '<div class="text-center"><div class="spinner-border spinner-border-sm text-success me-2"></div>獲取天氣數據...</div>';
        
        displayCalendar();
        
        const [currentData, forecastData] = await Promise.all([
            fetch(`https://data.weather.gov.hk/weatherAPI/opendata/weather.php?dataType=rhrread&lang=tc&_=${Date.now()}`).then(r => r.json()),
            fetch(`https://data.weather.gov.hk/weatherAPI/opendata/weather.php?dataType=flw&lang=tc&_=${Date.now()}`).then(r => r.json())
        ]);
        
        console.log('✅ 天氣數據獲取成功');
        
        const tempData = currentData.temperature?.data || [];
        const humidityData = currentData.relative_humidity?.data || [];
        
        let districtTemp = tempData.find(item => 
            item.place.includes(stationInfo.name) || 
            item.place.includes(nearestDistrict)
        );
        
        if (!districtTemp) {
            for (const tempItem of tempData) {
                if (tempItem.place.includes('屯門') && nearestDistrict.includes('屯門')) {
                    districtTemp = tempItem;
                    break;
                }
                if (tempItem.place.includes('沙田') && nearestDistrict.includes('新界東')) {
                    districtTemp = tempItem;
                    break;
                }
                if (tempItem.place.includes('元朗') && nearestDistrict.includes('元朗')) {
                    districtTemp = tempItem;
                    break;
                }
            }
            
            if (!districtTemp && tempData.length > 0) {
                districtTemp = tempData[0];
                console.log(`⚠️ 使用備用溫度站: ${districtTemp.place}`);
            }
        }
        
        let districtHumidity = humidityData.find(item => 
            item.place.includes(stationInfo.name) || 
            item.place.includes(nearestDistrict)
        );
        
        if (districtTemp) {
            document.getElementById('temperatureValue').textContent = districtTemp.value;
            console.log(`🌡️ 溫度: ${districtTemp.value}°C (${districtTemp.place})`);
        } else {
            document.getElementById('temperatureValue').textContent = '--';
        }
        
        document.getElementById('temperaturePlace').textContent = `${nearestDistrict}區`;
        
        let generalHtml = `<strong>📍 您所在的區域：</strong>${districtDesc}<br>`;
        generalHtml += `<strong>🏢 最近氣象站：</strong>${stationInfo.name}<br>`;
        
        if (districtTemp) {
            generalHtml += `<strong>🌡️ 當前溫度：</strong>${districtTemp.value}°C<br>`;
        }
        
        if (districtHumidity) {
            generalHtml += `<strong>💧 相對濕度：</strong>${districtHumidity.value}%`;
            console.log(`💧 濕度: ${districtHumidity.value}%`);
        }
        
        if (forecastData.forecastMaxtemp && forecastData.forecastMintemp) {
            generalHtml += `<br><br><strong>📊 今日溫度：</strong>最高 ${forecastData.forecastMaxtemp}°C，最低 ${forecastData.forecastMintemp}°C`;
        }
        
        document.getElementById('weatherGeneral').innerHTML = generalHtml;
        
        if (forecastData.forecastDesc) {
            let forecastText = '';
            if (forecastData.forecastPeriod) {
                forecastText += `<strong class="text-warning">${forecastData.forecastPeriod}</strong><br><br>`;
            }
            forecastText += forecastData.forecastDesc.replace(/\n/g, '<br>');
            document.getElementById('weatherForecast').innerHTML = forecastText;
        }
        
        if (forecastData.outlook) {
            document.getElementById('weatherOutlook').textContent = forecastData.outlook;
        }
        
        const updateTime = forecastData.updateTime || currentData.updateTime;
        if (updateTime) {
            try {
                const time = new Date(updateTime);
                const formattedTime = `${time.getFullYear()}-${(time.getMonth()+1).toString().padStart(2, '0')}-${time.getDate().toString().padStart(2, '0')} ${time.getHours().toString().padStart(2, '0')}:${time.getMinutes().toString().padStart(2, '0')}`;
                document.getElementById('temperatureTime').textContent = `更新時間：${formattedTime}`;
            } catch (e) {
                document.getElementById('temperatureTime').textContent = `更新時間：${updateTime}`;
            }
        }
        
        const modalElement = document.getElementById('weatherModal');
        const modalTitle = modalElement.querySelector('.modal-title');
        
        const titleIcon = locationSource === '重用輕鐵定位' ? '🚀' : '📍';
        modalTitle.innerHTML = `
            <span class="weather-header-icon">${titleIcon}</span>
            ${nearestDistrict}區天氣資訊
        `;
        
        if (currentWeatherModal) {
            currentWeatherModal.hide();
        }
        
        currentWeatherModal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',
            keyboard: false
        });
        
        currentWeatherModal.show();
        console.log('✅ 分區天氣模態框已顯示');
        
        setupModalAutoClose(modalElement);
        
    } catch (error) {
        console.error('❌ 分區天氣功能完全失敗:', error);
        
        document.getElementById('temperatureValue').textContent = '--';
        document.getElementById('temperaturePlace').textContent = '服務暫時不可用';
        
        let errorMessage = `<strong>❌ 無法獲取分區天氣</strong><br><br>`;
        errorMessage += `<small>錯誤原因：${error.message || '未知錯誤'}</small><br><br>`;
        
        if (error.code === 1) {
            errorMessage += `<strong>🔑 解決方案：</strong><br>`;
            errorMessage += `1. 請允許瀏覽器定位權限<br>`;
            errorMessage += `2. 或使用右上角的固定天氣按鈕`;
        } else if (error.code === 2 || error.code === 3) {
            errorMessage += `<strong>🌐 解決方案：</strong><br>`;
            errorMessage += `1. 檢查網絡連接<br>`;
            errorMessage += `2. 刷新頁面重試`;
        } else {
            errorMessage += `<strong>🔄 解決方案：</strong><br>`;
            errorMessage += `1. 稍後再試<br>`;
            errorMessage += `2. 使用固定天氣功能`;
        }
        
        document.getElementById('weatherGeneral').innerHTML = errorMessage;
        document.getElementById('weatherForecast').textContent = '服務暫時不可用，請稍後再試';
        document.getElementById('weatherOutlook').textContent = '--';
        document.getElementById('temperatureTime').textContent = '更新時間：獲取失敗';
        
        displayCalendar();
        
        const modalElement = document.getElementById('weatherModal');
        const modalTitle = modalElement.querySelector('.modal-title');
        modalTitle.innerHTML = `
            <span class="weather-header-icon">⚠️</span>
            天氣服務提醒
        `;
        
        if (currentWeatherModal) {
            currentWeatherModal.hide();
        }
        
        currentWeatherModal = new bootstrap.Modal(modalElement, {
            backdrop: 'static',
            keyboard: false
        });
        
        currentWeatherModal.show();
        
        const modalFooter = modalElement.querySelector('.modal-footer');
        const footerText = modalFooter.querySelector('#weatherFooterText');
        footerText.textContent = '數據來源：香港天文台 • 10秒後自動關閉';
        
        if (weatherModalAutoHideTimer) {
            clearTimeout(weatherModalAutoHideTimer);
        }
        weatherModalAutoHideTimer = setTimeout(() => {
            if (currentWeatherModal) {
                currentWeatherModal.hide();
            }
        }, 10000);
    }
}

// ==============================
// 輕鐵功能
// ==============================
const LRT_STATIONS = {
    "220": { id: '220', name: '大興(南)', lat: 22.40281821611273, lng: 113.97203523032393 },
    "100": { id: '100', name: '兆康', lat: 22.412013954554574, lng: 113.97839328454653 },
    "295": { id: '295', name: '屯門', lat: 22.39405653737988, lng: 113.97288393949789 },
    "280": { id: '280', name: '市中心', lat: 22.391473888531404, lng: 113.97497385511649 },
    "270": { id: '270', name: '安定', lat: 22.387940178705854, lng: 113.97505852639564 },
    "560": { id: '560', name: '水邊圍', lat: 22.444617253662155, lng: 114.01989951173945 },
    "570": { id: '570', name: '豐年路', lat: 22.444738245990856, lng: 114.02376243265216 },
    "580": { id: '580', name: '康樂路', lat: 22.444711482540036, lng: 114.02717108105638 },
    "590": { id: '590', name: '大棠路', lat: 22.44477799854364, lng: 114.02892926571472 },
    "600": { id: '600', name: '元朗', lat: 22.446001529588745, lng: 114.0338110969568 },
    "430": { id: '430', name: '天水圍', lat: 22.44846730647476, lng: 114.00457100528374 },
    "460": { id: '460', name: '天瑞', lat: 22.45622127702453, lng: 113.99952845264237 },
    "480": { id: '480', name: '天富', lat: 22.464647436539735, lng: 113.99765969796667 },
    "468": { id: '468', name: '頌富', lat: 22.462368618188663, lng: 113.99706082055354 },
    "070": { id: '070', name: '河田', lat: 22.39765662761687, lng: 113.97307721001496 },
    "080": { id: '080', name: '澤豐', lat: 22.404192792969063, lng: 113.97606465419265 }
};

function saveUserPosition(coords) {
    if (!coords || !coords.latitude || !coords.longitude) {
        console.error('❌ 無效的位置數據:', coords);
        return;
    }
    
    userGlobalPosition = {
        latitude: coords.latitude,
        longitude: coords.longitude,
        accuracy: coords.accuracy,
        timestamp: coords.timestamp || Date.now()
    };
    positionTimestamp = Date.now();
    
    console.log(`📍 位置已保存: ${coords.latitude.toFixed(6)}, ${coords.longitude.toFixed(6)}`);
}

function getDistance(lat1, lng1, lat2, lng2) {
    const R = 6371;
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLng = (lng2 - lng1) * Math.PI / 180;
    const a = Math.sin(dLat / 2) ** 2 +
              Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
              Math.sin(dLng / 2) ** 2;
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}

function findNearestStation(userLat, userLng) {
    let nearest = LRT_STATIONS['220'], minDistance = Infinity;
    for (const stationId in LRT_STATIONS) {
        const station = LRT_STATIONS[stationId];
        const distance = getDistance(userLat, userLng, station.lat, station.lng);
        if (distance < minDistance) {
            minDistance = distance;
            nearest = station;
        }
    }
    return nearest;
}

function showLoader(text = "輕鐵數據載入中…") {
    const loader = document.getElementById('loader');
    const loaderText = loader.querySelector('.loader-text');
    loaderText.textContent = text;
    loader.style.display = 'flex';
    setTimeout(() => loader.style.opacity = '1', 10);
}

function hideLoader() {
    const loader = document.getElementById('loader');
    loader.style.opacity = '0';
    setTimeout(() => loader.style.display = 'none', 300);
}

async function fetchLastUpdate(id) {
    try {
        const response = await fetch(`https://rt.data.gov.hk/v1/transport/mtr/lrt/getSchedule?station_id=${id}&_=${Date.now()}`, { 
            cache: 'no-store',
            timeout: 5000
        });
        if (!response.ok) throw new Error('API response was not ok');
        const data = await response.json();
        return data.system_time || '';
    } catch (error) {
        console.error('Failed to fetch last update:', error);
        return '';
    }
}

function updateTableRows(oldTbody, newTbody) {
    const oldRows = oldTbody.querySelectorAll('tr');
    const newRows = newTbody.querySelectorAll('tr');
    const maxRows = Math.max(oldRows.length, newRows.length);
    
    for (let i = 0; i < maxRows; i++) {
        if (i >= oldRows.length) {
            oldTbody.appendChild(newRows[i].cloneNode(true));
        } else if (i >= newRows.length) {
            oldRows[i].remove();
        } else if (oldRows[i].innerHTML !== newRows[i].innerHTML) {
            oldRows[i].innerHTML = newRows[i].innerHTML;
        }
    }
}

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[[\]]/g, "\\$&");
    const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
    const results = regex.exec(url);
    if (!results) return null;
    
    const decoded = decodeURIComponent(results[2]?.replace(/\+/g, " ") || "");
    return decoded || null;
}

function debounce(func, wait) {
    let timeout;
    return function (...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}

function waitForLRTLocation() {
    return new Promise((resolve) => {
        if (userGlobalPosition && 
            userGlobalPosition.latitude && 
            userGlobalPosition.longitude) {
            console.log('✅ 已有位置數據，直接使用');
            resolve(true);
            return;
        }
        
        console.log('⏳ 等待輕鐵定位獲取位置...');
        
        const timeoutId = setTimeout(() => {
            console.log('⏱️ 等待超時（5秒）');
            resolve(false);
        }, 5000);
        
        const checkInterval = setInterval(() => {
            if (userGlobalPosition && 
                userGlobalPosition.latitude && 
                userGlobalPosition.longitude) {
                clearInterval(checkInterval);
                clearTimeout(timeoutId);
                console.log(`✅ 檢測到位置數據`);
                resolve(true);
            }
        }, 300);
    });
}

async function refreshMessages(id = null, forceGeo = false) {
    const errorMessage = document.getElementById('error-message');
    const tableContainer = document.getElementById('table');
    const tableBuffer = document.getElementById('table-buffer');
    const stationNameEl = document.getElementById('station-name');
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const now = Date.now();

    let stationId = id || getParameterByName('id') || '220';
    let stationName = getParameterByName('name') || '大興(南)';
    
    if (stationName && stationName !== '大興(南)') {
        try {
            stationName = decodeURIComponent(stationName);
        } catch (e) {
            console.warn('車站名稱解碼失敗:', e);
            stationName = '大興(南)';
        }
    }

    if ((!stationId || forceGeo) && !manualSelection) {
        try {
            showLoader("定位中…");
            const position = await new Promise((resolve, reject) => {
                navigator.geolocation.getCurrentPosition(resolve, reject, { 
                    timeout: 10000,
                    maximumAge: 30000,
                    enableHighAccuracy: false 
                });
            });
            const newPosition = position.coords;
            const nearestStation = findNearestStation(newPosition.latitude, newPosition.longitude);
            stationId = nearestStation.id;
            stationName = nearestStation.name;
            lastPosition = newPosition;
            
            saveUserPosition(newPosition);
            
            navLinks.forEach(link => link.classList.remove('active'));
            document.querySelector(`.nav-link[data-id="geolocation"]`).classList.add('active');
            
            const url = new URL(window.location);
            url.searchParams.set('id', stationId);
            url.searchParams.set('name', encodeURIComponent(stationName));
            window.history.replaceState({}, '', url);
            
            hideLoader();
        } catch (error) {
            console.error('Geolocation failed:', error);
            stationId = '220';
            stationName = '大興(南)';
            navLinks.forEach(link => link.classList.remove('active'));
            document.querySelector(`.nav-link[data-id="220"]`).classList.add('active');
            errorMessage.textContent = '無法獲取位置，使用預設站點：大興(南)';
            errorMessage.style.display = 'block';
            hideLoader();
        }
    }

    if (stationId && manualSelection) {
        const station = LRT_STATIONS[stationId];
        if (station) {
            stationName = station.name;
            navLinks.forEach(link => link.classList.remove('active'));
            
            const targetLink = document.querySelector(`.nav-link[data-id="${stationId}"]`);
            if (targetLink) {
                targetLink.classList.add('active');
            }
        } else {
            stationId = '220';
            stationName = '大興(南)';
            navLinks.forEach(link => link.classList.remove('active'));
            document.querySelector(`.nav-link[data-id="220"]`).classList.add('active');
        }
    }

    stationNameEl.textContent = stationName;

    if (tableCache.id === stationId && tableCache.tableData && (now - tableCache.timestamp) < cacheDuration && !forceGeo) {
        requestAnimationFrame(() => {
            tableContainer.innerHTML = tableCache.tableData;
            hideLoader();
            tableContainer.offsetHeight;
        });
        return;
    }

    try {
        if (!tableContainer.innerHTML || tableCache.id !== stationId) {
            showLoader();
        }

        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), 8000);
        
        const tableResponse = await fetch(`table.php?id=${stationId}&_=${now}`, { 
            cache: 'no-store',
            signal: controller.signal
        });
        
        clearTimeout(timeoutId);
        
        if (!tableResponse.ok) throw new Error('Table response was not ok');
        
        const tableData = await tableResponse.text();

        requestAnimationFrame(() => {
            tableBuffer.innerHTML = tableData;
            const newTable = tableBuffer.querySelector('table');
            const oldTable = tableContainer.querySelector('table');
            
            if (newTable && oldTable) {
                updateTableRows(oldTable.querySelector('tbody'), newTable.querySelector('tbody'));
            } else {
                tableContainer.style.opacity = '0';
                tableContainer.innerHTML = tableData;
                setTimeout(() => {
                    tableContainer.style.opacity = '1';
                }, 50);
            }

            tableCache = { 
                id: stationId, 
                tableData, 
                timestamp: now 
            };
            
            hideLoader();
            errorMessage.style.display = 'none';
            
            tableContainer.offsetHeight;
        });
        
    } catch (error) {
        console.error('Failed to load table data:', error);
        requestAnimationFrame(() => {
            errorMessage.textContent = '無法載入輕鐵數據，請稍後再試！';
            errorMessage.style.display = 'block';
            
            if (tableCache.id === stationId && tableCache.tableData) {
                tableContainer.innerHTML = tableCache.tableData;
            }
            
            hideLoader();
            tableContainer.offsetHeight;
        });
    }
}

const debouncedRefresh = debounce((forceGeo) => refreshMessages(null, forceGeo), 500);

// ==============================
// 分區天氣功能
// ==============================
const WEATHER_STATIONS = {
    "港島": { name: "香港天文台", lat: 22.3027, lng: 114.1772 },
    "九龍": { name: "京士柏", lat: 22.3114, lng: 114.1812 },
    "新界東": { name: "沙田", lat: 22.3824, lng: 114.1895 },
    "新界西": { name: "流浮山", lat: 22.4706, lng: 113.9856 },
    "大嶼山": { name: "橫瀾島", lat: 22.1833, lng: 114.3000 },
    "屯門": { name: "屯門", lat: 22.3950, lng: 113.9750 },
    "元朗": { name: "元朗公園", lat: 22.4450, lng: 114.0289 },
    "北區": { name: "打鼓嶺", lat: 22.5344, lng: 114.1558 },
    "西貢": { name: "西貢", lat: 22.3833, lng: 114.2667 },
    "荃灣": { name: "荃灣城門谷", lat: 22.3750, lng: 114.1083 }
};

const DISTRICT_DESCRIPTIONS = {
    "港島": "香港島及鄰近島嶼",
    "九龍": "九龍半島及東南沿岸",
    "新界東": "沙田、大埔、北區等地",
    "新界西": "屯門、元朗、天水圍等地",
    "大嶼山": "大嶼山及離島區域",
    "屯門": "屯門及青山灣一帶",
    "元朗": "元朗及新田等地",
    "北區": "上水、粉嶺、打鼓嶺",
    "西貢": "西貢、將軍澳、清水灣",
    "荃灣": "荃灣、葵涌、青衣"
};

function findNearestDistrict(userLat, userLng) {
    let nearestDistrict = "九龍";
    let minDistance = Infinity;
    
    for (const district in WEATHER_STATIONS) {
        const station = WEATHER_STATIONS[district];
        const distance = getDistance(userLat, userLng, station.lat, station.lng);
        if (distance < minDistance) {
            minDistance = distance;
            nearestDistrict = district;
        }
    }
    return nearestDistrict;
}

function initializeDistrictWeatherButton() {
    const districtWeatherBtn = document.getElementById('district-weather-btn');
    if (districtWeatherBtn) {
        districtWeatherBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            console.log('📍 分區天氣按鈕被點擊');
            showDistrictWeatherModal(true);
        });
        
        districtWeatherBtn.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(-15deg)';
        });
        
        districtWeatherBtn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    }
}

// ==============================
// PWA 更新管理器
// ==============================
function initPWAUpdateManager() {
    if (!('serviceWorker' in navigator)) return;
    
    console.log('📱 初始化 PWA 更新管理器');
    
    navigator.serviceWorker.register('/sw.js')
        .then(registration => {
            swRegistration = registration;
            console.log('✅ Service Worker 註冊成功', registration.scope);
            
            if (registration.waiting) {
                console.log('⏳ 發現等待中的 Service Worker');
                newServiceWorker = registration.waiting;
                showUpdateNotification('新版本已下載完成');
            }
            
            registration.addEventListener('updatefound', () => {
                console.log('🆕 發現新版本正在下載');
                newServiceWorker = registration.installing;
                
                newServiceWorker.addEventListener('statechange', () => {
                    console.log('📦 Service Worker 狀態:', newServiceWorker.state);
                    
                    if (newServiceWorker.state === 'installed') {
                        if (navigator.serviceWorker.controller) {
                            console.log('✅ 新版本已準備就緒');
                            showUpdateNotification('新版本已準備就緒');
                        } else {
                            console.log('🎉 Service Worker 首次安裝完成');
                        }
                    }
                });
            });
            
            registration.update();
            
            setInterval(() => {
                console.log('🔄 定期檢查更新...');
                registration.update().catch(err => {
                    console.warn('⚠️ 檢查更新失敗:', err);
                });
            }, 15 * 60 * 1000);
        })
        .catch(err => {
            console.error('❌ Service Worker 註冊失敗:', err);
        });
    
    navigator.serviceWorker.addEventListener('controllerchange', () => {
        console.log('🔄 Service Worker 控制器已變更');
        showReloadNotification();
    });
    
    navigator.serviceWorker.addEventListener('message', event => {
        console.log('📨 收到 SW 消息:', event.data);
        
        if (event.data.type === 'UPDATE_AVAILABLE') {
            showUpdateNotification(`新版本 ${event.data.version} 已準備就緒`);
        }
        
        if (event.data.type === 'ACTIVATED') {
            console.log(`✅ Service Worker ${event.data.version} 已激活`);
        }
        
        if (event.data.type === 'VERSION') {
            console.log(`📊 當前 SW 版本: ${event.data.version}`);
        }
    });
}

function showUpdateNotification(message = '發現新版本') {
    const oldToast = document.getElementById('pwa-update-toast');
    if (oldToast) oldToast.remove();
    
    const toast = document.createElement('div');
    toast.id = 'pwa-update-toast';
    toast.innerHTML = `
        <div style="display: flex; align-items: center; gap: 12px; flex: 1;">
            <div style="
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: rgba(255,255,255,0.2);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                animation: spin 2s linear infinite;
            ">🔄</div>
            <div style="flex: 1;">
                <div style="font-weight: bold; margin-bottom: 4px;">${message}</div>
                <div style="font-size: 13px; opacity: 0.9;">點擊立即更新以使用最新功能</div>
            </div>
            <button id="update-now-btn" style="
                background: white;
                border: none;
                padding: 10px 20px;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                color: #1a73e8;
                font-size: 14px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.2);
                transition: all 0.2s ease;
            ">立即更新</button>
        </div>
    `;
    
    toast.style.cssText = `
        position: fixed;
        bottom: 20px;
        left: 20px;
        right: 20px;
        max-width: 450px;
        margin: 0 auto;
        background: linear-gradient(135deg, #1a73e8, #0d47a1);
        color: white;
        padding: 16px;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.3);
        z-index: 100000;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.15);
        animation: slideUp 0.3s ease;
        transition: all 0.3s ease;
    `;
    
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideUp {
            from { transform: translateY(100px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        #update-now-btn:hover {
            transform: scale(1.05);
            background: #f0f0f0;
        }
    `;
    document.head.appendChild(style);
    
    document.body.appendChild(toast);
    
    document.getElementById('update-now-btn').addEventListener('click', () => {
        console.log('🔄 用戶選擇立即更新');
        
        if (newServiceWorker) {
            newServiceWorker.postMessage({ type: 'SKIP_WAITING' });
        } else if (swRegistration && swRegistration.waiting) {
            swRegistration.waiting.postMessage({ type: 'SKIP_WAITING' });
        } else {
            window.location.reload();
        }
        
        toast.remove();
    });
}

function showReloadNotification() {
    const oldToast = document.getElementById('pwa-update-toast');
    if (oldToast) oldToast.remove();
    
    const toast = document.createElement('div');
    toast.id = 'pwa-update-toast';
    toast.innerHTML = `
        <div style="display: flex; align-items: center; gap: 12px; flex: 1;">
            <div style="
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: rgba(255,255,255,0.2);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
            ">✅</div>
            <div style="flex: 1;">
                <div style="font-weight: bold; margin-bottom: 4px;">更新已完成</div>
                <div style="font-size: 13px; opacity: 0.9;">5秒後自動重新載入</div>
            </div>
            <button id="reload-now-btn" style="
                background: white;
                border: none;
                padding: 10px 20px;
                border-radius: 25px;
                font-weight: 600;
                cursor: pointer;
                color: #1a73e8;
                font-size: 14px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.2);
            ">立即載入</button>
        </div>
    `;
    
    toast.style.cssText = `
        position: fixed;
        bottom: 20px;
        left: 20px;
        right: 20px;
        max-width: 450px;
        margin: 0 auto;
        background: linear-gradient(135deg, #43a047, #2e7d32);
        color: white;
        padding: 16px;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.3);
        z-index: 100000;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.15);
        animation: slideUp 0.3s ease;
    `;
    
    document.body.appendChild(toast);
    
    document.getElementById('reload-now-btn').addEventListener('click', () => {
        window.location.reload();
    });
    
    setTimeout(() => {
        if (toast.parentNode) {
            window.location.reload();
        }
    }, 5000);
}

function manualCheckUpdate() {
    console.log('🔍 手動檢查更新...');
    
    if (!('serviceWorker' in navigator)) return;
    
    const tip = document.createElement('div');
    tip.style.cssText = `
        position: fixed;
        bottom: 100px;
        left: 20px;
        right: 20px;
        max-width: 300px;
        margin: 0 auto;
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 12px 20px;
        border-radius: 30px;
        text-align: center;
        z-index: 100000;
        backdrop-filter: blur(5px);
        animation: fadeInOut 2s ease;
        font-size: 14px;
    `;
    tip.textContent = '🔄 檢查更新中...';
    document.body.appendChild(tip);
    
    navigator.serviceWorker.getRegistration().then(registration => {
        if (registration) {
            registration.update().then(() => {
                console.log('✅ 更新檢查完成');
                tip.textContent = '✅ 已檢查更新';
                
                if (navigator.serviceWorker.controller) {
                    navigator.serviceWorker.controller.postMessage({ type: 'GET_VERSION' });
                }
                
                setTimeout(() => tip.remove(), 2000);
            }).catch(err => {
                console.error('❌ 檢查更新失敗:', err);
                tip.textContent = '❌ 檢查更新失敗';
                setTimeout(() => tip.remove(), 2000);
            });
        } else {
            tip.textContent = '❌ 未找到 Service Worker';
            setTimeout(() => tip.remove(), 2000);
        }
    });
}

function addManualUpdateButton() {
    const btn = document.createElement('button');
    btn.innerHTML = '🔄 檢查更新';
    btn.style.cssText = `
        position: fixed;
        bottom: 80px;
        right: 20px;
        background: rgba(26,115,232,0.9);
        color: white;
        border: none;
        border-radius: 30px;
        padding: 10px 18px;
        font-size: 14px;
        backdrop-filter: blur(5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        cursor: pointer;
        z-index: 9999;
        border: 2px solid rgba(255,255,255,0.2);
        transition: all 0.2s ease;
    `;
    
    btn.addEventListener('mouseenter', () => {
        btn.style.transform = 'scale(1.05)';
        btn.style.background = '#1a73e8';
    });
    
    btn.addEventListener('mouseleave', () => {
        btn.style.transform = 'scale(1)';
        btn.style.background = 'rgba(26,115,232,0.9)';
    });
    
    btn.addEventListener('click', manualCheckUpdate);
    
    document.body.appendChild(btn);
}

// ==============================
// 初始化
// ==============================
document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    const navbarCollapse = document.getElementById('navbarNav');
    const bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggle: false });
    lastRefreshTime = Date.now();
    
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const id = link.getAttribute('data-id');
            const name = link.getAttribute('data-name');
            
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
            
            if (window.innerWidth < 992) bsCollapse.hide();

            if (id === 'geolocation') {
                manualSelection = false;
                lastPosition = null;
                refreshMessages(null, true);
            } else {
                manualSelection = true;
                
                const url = new URL(window.location);
                url.searchParams.set('id', id);
                url.searchParams.set('name', encodeURIComponent(name));
                window.history.replaceState({}, '', url);
                
                refreshMessages(id, false);
            }
        });
    });

    refreshMessages(null, true);
    
    initializeDistrictWeatherButton();
    
    // 2秒後自動彈出分區天氣
    setTimeout(() => {
        console.log('⏰ 2秒後自動顯示分區天氣');
        showDistrictWeatherModal(true);
    }, 2000);
    
    setInterval(() => debouncedRefresh(false), 5000);
    setInterval(() => { 
        if (!manualSelection) {
            lastPosition = null; 
            refreshMessages(null, true); 
        }
    }, 60000);
    
    setTimeout(initPWAUpdateManager, 1000);
    setTimeout(addManualUpdateButton, 3000);
    
    document.addEventListener('visibilitychange', () => {
        if (!document.hidden && swRegistration) {
            console.log('👀 頁面可見，檢查更新');
            swRegistration.update();
        }
    });
});

// Visibility / focus triggers
document.addEventListener('visibilitychange', () => {
    if (!document.hidden) {
        lastPosition = null;
        refreshMessages(null, true);
    }
});

window.addEventListener('focus', () => {
    lastPosition = null;
    refreshMessages(null, true);
});

// Wake Lock
let wakeLock = null;
async function requestWakeLock() {
    try {
        if ('wakeLock' in navigator) {
            wakeLock = await navigator.wakeLock.request('screen');
            wakeLock.addEventListener('release', () => requestWakeLock());
        } else {
            enableIOSKeepAlive();
        }
    } catch (err) {
        console.error(err.name, err.message);
    }
}

function enableIOSKeepAlive() {
    const video = document.createElement('video');
    video.setAttribute('playsinline','');
    video.setAttribute('muted','');
    video.setAttribute('loop','');
    video.style.position='absolute';
    video.style.width='1px';
    video.style.height='1px';
    video.style.opacity='0';
    
    document.body.appendChild(video);
    const playVideo = () => video.play().catch(err=>console.log(err));
    document.addEventListener("click", playVideo, { once:true });
    document.addEventListener("touchstart", playVideo, { once:true });
}

document.addEventListener("visibilitychange", () => { 
    if (wakeLock && document.visibilityState==="visible") requestWakeLock(); 
});

document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("click", requestWakeLock, { once:true });
    document.addEventListener("touchstart", requestWakeLock, { once:true });
});

// Service Worker
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.getRegistration().then(reg => {
        if (reg) {
            reg.update();
            console.log('🔄 Service Worker 強制更新');
        }
    });
    
    navigator.serviceWorker.register('/sw.js')
        .then(reg => {
            console.log('✅ Service Worker 重新註冊:', reg.scope);
            
            if (reg.active) {
                console.log('🟢 Service Worker 活躍中');
                reg.active.postMessage({type: 'PING'});
            }
        });
}
</script>
</body>
</html>
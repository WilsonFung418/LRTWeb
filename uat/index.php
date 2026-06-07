<!DOCTYPE html>
<html lang="zh-HK">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="theme-color" content="#0f172a">
<meta name="description" content="輕鐵實時到站時間 | 大興(南)">
<link rel="manifest" href="manifest.json">
<link rel="apple-touch-icon" sizes="192x192" href="/icons/192.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
:root {
  --bg-primary: #0f172a;
  --bg-card: #1e293b;
  --bg-card-hover: #273549;
  --text-primary: #f1f5f9;
  --text-secondary: #94a3b8;
  --text-muted: #64748b;
  --border: #334155;
  --accent: #3b82f6;
  --green: #22c55e;
  --yellow: #eab308;
  --red: #ef4444;
  --orange: #f97316;
  --r505: #8B4513;
  --r507: #8E44AD;
  --r610: #FF6B35;
  --r614: #F1C40F;
  --r615: #27AE60;
  --r705: #F39C12;
  --r751: #3498DB;
  --r761P: #1ABC9C;
}
*{box-sizing:border-box;margin:0;padding:0}
html{font-size:16px;-webkit-text-size-adjust:100%}
body{font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;background:var(--bg-primary);color:var(--text-primary);min-height:100dvh;padding-bottom:80px;overflow-x:hidden}
.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);border:0}

/* ── Header ── */
.site-header{background:linear-gradient(180deg,#0f172a 0%,rgba(15,23,42,0))position:sticky;top:0;z-index:50;padding:1rem 1.25rem 0.75rem;backdrop-filter:blur(12px);-webkit-backdrop-filter:blur(12px);border-bottom:1px solid var(--border)}

/* ── Weather Button ── */
.header-weather-btn{
  width:36px;height:36px;border-radius:50%;
  border:none;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  background:linear-gradient(135deg,#f59e0b 0%,#f97316 50%,#ef4444 100%);
  color:#fff;font-size:1rem;
  box-shadow:0 2px 12px rgba(245,158,11,.3),inset 0 1px 0 rgba(255,255,255,.2);
  backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);
  transition:all .25s cubic-bezier(.4,0,.2,1);
  flex-shrink:0;
  position:relative;overflow:hidden;
}
.header-weather-btn::before{
  content:'';position:absolute;inset:0;
  background:radial-gradient(circle at 30% 30%,rgba(255,255,255,.3) 0%,transparent 60%);
  border-radius:50%;
}
.header-weather-btn:hover{
  transform:scale(1.1);
  box-shadow:0 4px 20px rgba(245,158,11,.5),0 0 30px rgba(245,158,11,.25),inset 0 1px 0 rgba(255,255,255,.25);
}
.header-weather-btn:active{transform:scale(.95)}
.header-weather-btn .bi{position:relative;z-index:1;filter:drop-shadow(0 1px 2px rgba(0,0,0,.3))}
.header-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:.75rem}
.station-name{font-size:1.5rem;font-weight:800;letter-spacing:-.5px;color:var(--text-primary)}
.live-badge{display:inline-flex;align-items:center;gap:6px;padding:4px 10px;border-radius:20px;background:rgba(34,197,94,.15);border:1px solid rgba(34,197,94,.3);font-size:.7rem;font-weight:700;color:var(--green);letter-spacing:.5px;text-transform:uppercase}
.live-dot{width:7px;height:7px;border-radius:50%;background:var(--green);animation:pulse-dot 1.8s ease-in-out infinite}
@keyframes pulse-dot{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.4;transform:scale(.75)}}
.offline-badge{background:rgba(245,158,11,.15);border-color:rgba(245,158,11,.3);color:var(--yellow)}
.header-meta{display:flex;align-items:center;gap:.75rem;font-size:.75rem;color:var(--text-muted)}
.header-meta span{display:flex;align-items:center;gap:4px}

/* ── Favorites Bar ── */
.fav-bar{display:flex;gap:.5rem;overflow-x:auto;padding:.5rem 1.25rem;scrollbar-width:none;-webkit-overflow-scrolling:touch}
.fav-bar::-webkit-scrollbar{display:none}
.fav-pill{display:inline-flex;align-items:center;gap:4px;padding:6px 12px;border-radius:20px;background:var(--bg-card);border:1px solid var(--border);font-size:.75rem;font-weight:600;color:var(--text-secondary);cursor:pointer;white-space:nowrap;transition:all .2s;touch-action:manipulation}
.fav-pill:hover,.fav-pill:active{background:var(--bg-card-hover);border-color:var(--accent);color:var(--text-primary)}
.fav-pill.active{background:rgba(59,130,246,.2);border-color:var(--accent);color:var(--accent)}
.fav-pill .fav-star{color:#f59e0b;font-size:.85rem}

/* ── Direction Cards ── */
.main-content{padding:.75rem 1rem;max-width:600px;margin:0 auto}
.direction-card{background:var(--bg-card);border-radius:16px;margin-bottom:.75rem;overflow:hidden;border:1px solid var(--border);transition:border-color .2s}
.direction-card:hover{border-color:rgba(59,130,246,.3)}
.direction-header{display:flex;align-items:center;gap:.75rem;padding:.85rem 1.1rem;border-bottom:1px solid var(--border)}
.direction-icon{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.2rem;flex-shrink:0}
.direction-label{flex:1;min-width:0}
.direction-name{font-size:.95rem;font-weight:700;color:var(--text-primary);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.direction-sub{font-size:.72rem;color:var(--text-muted);margin-top:2px}
.direction-count{font-size:.7rem;font-weight:600;color:var(--text-muted);background:rgba(255,255,255,.05);padding:2px 8px;border-radius:10px}

/* ── Route Groups ── */
.route-group{padding:.6rem 1.1rem;border-bottom:1px solid rgba(255,255,255,.04);display:flex;align-items:center;gap:.75rem}
.route-group:last-child{border-bottom:none}
.route-badge{display:inline-flex;align-items:center;justify-content:center;padding:4px 0;min-width:40px;border-radius:8px;font-size:.85rem;font-weight:800;color:#fff;flex-shrink:0}
.route-trains{flex:1;display:flex;flex-direction:column;gap:.4rem}
.train-row{display:flex;align-items:center;gap:.5rem}
.train-countdown{font-size:1.5rem;font-weight:900;line-height:1;min-width:48px;letter-spacing:-1px}
.train-countdown.green{color:var(--green)}
.train-countdown.yellow{color:var(--yellow)}
.train-countdown.red{color:var(--red)}
.train-unit{font-size:.75rem;font-weight:600;color:var(--text-muted)}
.train-meta{font-size:.7rem;color:var(--text-muted);margin-left:auto}

/* ── Empty / Loading ── */
.state-container{padding:2rem 1.25rem;text-align:center}
.state-icon{font-size:3rem;margin-bottom:.75rem}
.state-title{font-size:1.1rem;font-weight:700;color:var(--text-primary);margin-bottom:.5rem}
.state-desc{font-size:.85rem;color:var(--text-muted);line-height:1.5}
.retry-btn{display:inline-flex;align-items:center;gap:.5rem;padding:.65rem 1.5rem;border-radius:12px;color:var(--accent);background:transparent;font-size:.9rem;font-weight:700;border:none;cursor:pointer;margin-top:1rem;transition:all .2s;touch-action:manipulation}
.retry-btn:hover{background:#2563eb;transform:scale(1.03)}
.spinner{width:40px;height:40px;border:4px solid rgba(255,255,255,.1);border-top-color:var(--accent);border-radius:50%;animation:spin .8s linear infinite;margin:0 auto 1rem}
@keyframes spin{to{transform:rotate(360deg)}}

/* ── Navbar ── */
.bottom-nav{position:fixed;bottom:0;left:0;right:0;background:rgba(15,23,42,.95);backdrop-filter:blur(16px);-webkit-backdrop-filter:blur(16px);border-top:1px solid var(--border);z-index:99999;padding:.5rem 1rem;padding-bottom:max(.5rem,env(safe-area-inset-bottom));-webkit-transform:translateZ(0);transform:translateZ(0);will-change:transform;pointer-events:auto;touch-action:none}
.nav-inner{display:flex;justify-content:space-around;gap:.25rem}
.nav-item{display:flex;flex-direction:column;align-items:center;gap:2px;padding:.5rem .75rem;border-radius:12px;cursor:pointer;transition:all .2s;color:var(--text-muted);min-width:48px;min-height:48px;touch-action:manipulation}
.nav-item:hover,.nav-item:active{background:rgba(255,255,255,.06);color:var(--text-primary)}
.nav-item.active{color:var(--accent)}
.nav-item .nav-icon{font-size:1.3rem;line-height:1}
.nav-item .nav-label{font-size:.6rem;font-weight:600;letter-spacing:.2px}

/* ── Weather Modal ── */
#weatherModal .modal-content {
  background: rgba(15, 23, 42, 0.85) !important;
  backdrop-filter: blur(24px);
  -webkit-backdrop-filter: blur(24px);
  border: 1px solid rgba(255, 255, 255, 0.08) !important;
  border-radius: 24px !important;
  box-shadow: 0 24px 80px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255,255,255,0.04) inset !important;
  overflow: hidden;
}
#weatherModal .modal-header {
  border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
  padding: 6px 12px !important;
  background: rgba(255, 255, 255, 0.02) !important;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
#weatherModal .modal-title {
  color: var(--text-primary) !important;
  font-weight: 700 !important;
  font-size: 1rem !important;
  display: flex;
  align-items: center;
  gap: 6px;
}
#weatherModal .modal-body {
  padding: 8px 12px !important;
  color: var(--text-primary);
  max-height: 80dvh;
  overflow-y: auto;
}
#weatherModal .modal-body::-webkit-scrollbar { width: 4px; }
#weatherModal .modal-body::-webkit-scrollbar-track { background: transparent; }
#weatherModal .modal-body::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 4px; }
#weatherModal .btn-close {
  filter: brightness(0) invert(1);
  opacity: 0.6;
  transition: opacity 0.2s;
  font-size: 1rem;
}
#weatherModal .btn-close:hover { opacity: 1; }
#weatherModal .modal-footer {
  border-top: 1px solid rgba(255,255,255,0.06) !important;
  background: rgba(255,255,255,0.02) !important;
  padding: 4px 12px !important;
}

/* ── Weather Modal: Temperature Header ── */
.weather-modal-header {
  text-align: center;
  padding: 2px 0 8px;
}
.weather-temp-display {
  display: flex;
  align-items: flex-start;
  justify-content: center;
  gap: 4px;
  line-height: 1;
}
.weather-temp-value {
  font-size: 4rem;
  font-weight: 900;
  letter-spacing: -2px;
  background: linear-gradient(135deg, #f59e0b 0%, #ef4444 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  line-height: 1;
}
.weather-temp-unit {
  font-size: 1.5rem;
  font-weight: 700;
  color: #f59e0b;
  margin-top: 0.5rem;
}
.weather-place {
  font-size: 1rem;
  font-weight: 600;
  color: var(--text-primary);
  margin-top: 0.15rem;
}
.weather-time {
  font-size: 0.72rem;
  color: var(--text-muted);
  margin-top: 0.1rem;
}

/* ── Weather Modal: Data Cards ── */
.weather-card {
  background: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.06);
  border-radius: 14px;
  margin-bottom: 4px;
  overflow: hidden;
  transition: border-color 0.2s;
}
.weather-card:last-child { margin-bottom: 0; }
.weather-card:hover { border-color: rgba(255, 255, 255, 0.1); }
.weather-card-header {
  display: flex;
  align-items: center;
  gap: 4px;
  padding: 4px 8px;
  font-size: 0.78rem;
  font-weight: 700;
  color: var(--text-primary);
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  background: rgba(255, 255, 255, 0.02);
}
.weather-card-icon { font-size: 0.9rem; flex-shrink: 0; }
.weather-card-body {
  padding: 4px 8px;
  font-size: 0.82rem;
  color: var(--text-secondary);
  line-height: 1.6;
  white-space: pre-line;
}

/* ── Weather Modal: Card Accent Colors ── */
.weather-card[data-type="general"] { border-left: 3px solid #f59e0b; }
.weather-card[data-type="forecast"] { border-left: 3px solid #3b82f6; }
.weather-card[data-type="outlook"] { border-left: 3px solid #8b5cf6; }
.weather-card[data-type="calendar"] { border-left: 3px solid #06b6d4; }

/* ── Weather Modal: Skeleton Loading ── */
.skeleton-line {
  height: 12px;
  border-radius: 6px;
  background: rgba(255, 255, 255, 0.06);
  animation: skeleton-pulse 1.5s ease-in-out infinite;
  margin-bottom: 8px;
}
.skeleton-line:last-child { margin-bottom: 0; }
.skeleton-line.w-3 { width: 30%; }
.skeleton-line.w-5 { width: 50%; }
.skeleton-line.w-7 { width: 70%; }
.skeleton-line.w-full { width: 100%; }
.skeleton-line.short { height: 10px; margin-top: 4px; }
@keyframes skeleton-pulse {
  0%, 100% { opacity: 0.4; }
  50% { opacity: 0.8; }
}

/* ── Weather Modal: Calendar Items ── */
.calendar-item {
  padding: 0.65rem 0;
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
}
.calendar-item:last-child { border-bottom: none; }
.calendar-date {
  font-size: 0.75rem;
  font-weight: 600;
  color: #4dd0e1;
  margin-bottom: 3px;
}
.calendar-title {
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--text-primary);
  line-height: 1.4;
}
.calendar-desc {
  font-size: 0.75rem;
  color: var(--text-muted);
  margin-top: 3px;
  line-height: 1.5;
}
.calendar-location {
  font-size: 0.72rem;
  color: var(--text-muted);
  margin-top: 3px;
}
.calendar-empty {
  text-align: center;
  padding: 1rem;
  color: var(--text-muted);
  font-size: 0.82rem;
}

/* ── Station Picker Modal ── */
.modal-overlay{position:fixed;inset:0;background:rgba(0,0,0,.7);z-index:100;display:flex;align-items:flex-end;justify-content:center;opacity:0;pointer-events:none;transition:opacity .3s}
.modal-overlay.show{opacity:1;pointer-events:auto}
.modal-sheet{background:var(--bg-card);border-radius:20px 20px 0 0;width:100%;max-width:600px;max-height:80dvh;overflow:hidden;transform:translateY(100%);transition:transform .35s cubic-bezier(.32,.72,.15,1)}
.modal-overlay.show .modal-sheet{transform:translateY(0)}
.modal-handle{width:40px;height:4px;border-radius:2px;background:var(--border);margin:.75rem auto}
.modal-title{padding:.5rem 1.25rem 1rem;font-size:1rem;font-weight:700;color:var(--text-secondary);border-bottom:1px solid var(--border)}
.station-list{overflow-y:auto;max-height:calc(80dvh - 120px);-webkit-overflow-scrolling:touch}
.station-item{display:flex;align-items:center;gap:.75rem;padding:.85rem 1.25rem;cursor:pointer;transition:background .15s;border-bottom:1px solid rgba(255,255,255,.04);min-height:52px;touch-action:manipulation}
.station-item:hover{background:rgba(255,255,255,.05)}
.station-item-name{font-size:.95rem;font-weight:600;color:var(--text-primary)}
.station-item-id{font-size:.7rem;color:var(--text-muted)}
.star-btn{background:none;border:none;cursor:pointer;font-size:1.2rem;padding:.25rem;flex-shrink:0;transition:transform .2s}
.star-btn:hover{transform:scale(1.2)}
.star-btn.active{color:#f59e0b}

/* ── Utilities ── */
.text-green{color:var(--green)}.text-yellow{color:var(--yellow)}.text-red{color:var(--red)}
.text-orange{color:var(--orange)}
.divider{height:1px;background:var(--border);margin:.5rem 0}
.chevron-up{width:36px;height:36px;border-radius:10px;background:rgba(34,197,94,.15);display:flex;align-items:center;justify-content:center}
.chevron-down{width:36px;height:36px;border-radius:10px;background:rgba(59,130,246,.15);display:flex;align-items:center;justify-content:center}

/* ── Dynamic Calendar Icon ── */
.cal-icon{display:inline-flex;flex-direction:column;align-items:center;width:24px;height:26px;line-height:1;border-radius:4px;overflow:hidden;background:rgba(255,255,255,.08)}
.cal-month{font-size:6px;font-weight:700;background:var(--accent);color:#fff;text-align:center;letter-spacing:.3px;padding:1px 0;width:100%}
.cal-day{font-size:10px;font-weight:800;color:var(--text-primary);text-align:center;line-height:1.2;margin-top:1px}
</style>
<title>輕鐵實時 | 大興(南)</title>
</head>
<body>

<!-- Header -->
<header class="site-header">
  <div class="header-top">
    <div>
      <div class="station-name" id="stationName">大興(南)</div>
    </div>
    <div style="display:flex;align-items:center;gap:.75rem">
      <div class="live-badge" id="liveBadge">
        <span class="live-dot"></span>
        <span id="liveText">LIVE</span>
      </div>
    </div>
  </div>
  <div class="header-meta">
    <span><i class="bi bi-clock"></i> <span id="headerTime">--</span></span>
    <span id="headerStatus"></span>
  </div>
</header>

<!-- Favorites Bar -->
<div class="fav-bar" id="favBar"></div>

<!-- Main Content -->
<main class="main-content" id="mainContent">
  <div class="state-container" id="loadingState">
    <div class="spinner"></div>
    <div class="state-title" id="loadingTitle">載入中...</div>
    <div class="state-desc" id="loadingDesc">載入輕鐵數據...</div>
  </div>
  <div id="errorState" style="display:none">
    <div class="state-container">
      <div class="state-icon">⚠️</div>
      <div class="state-title" id="errorTitle">載入失敗</div>
      <div class="state-desc" id="errorDesc">請檢查網絡連接</div>
      <button class="retry-btn" id="retryBtn"><span>🔄</span> 重試</button>
    </div>
  </div>
  <div id="contentArea" style="display:none">
    <div class="direction-card" id="cardYuenLong">
      <div class="direction-header">
        <div class="direction-icon chevron-up">⬆️</div>
        <div class="direction-label">
          <div class="direction-name">月台 1</div>
          <div class="direction-sub"></div>
        </div>
        <div class="direction-count" id="countYuenLong">0 班</div>
      </div>
      <div id="trainsYuenLong"></div>
    </div>
<div class="direction-card" id="cardTuenMun">
      <div class="direction-header">
        <div class="direction-icon chevron-down">⬇️</div>
        <div class="direction-label">
          <div class="direction-name">月台 2</div>
          <div class="direction-sub"></div>
        </div>
        <div class="direction-count" id="countTuenMun">0班</div>
      </div>
      <div id="trainsTuenMun"></div>
    </div>
    
  </div>
</main>

<!-- Bottom Nav -->
<nav class="bottom-nav">
  <div class="nav-inner">
    <div class="nav-item active" id="navHome" data-panel="home">
      <span class="nav-icon">🚈</span>
      <span class="nav-label">到站</span>
    </div>
    <div class="nav-item" id="navFav" data-panel="fav">
      <span class="nav-icon">⭐</span>
      <span class="nav-label">收藏</span>
    </div>
    <div class="nav-item" id="navStations" data-panel="stations">
      <span class="nav-icon">🗺️</span>
      <span class="nav-label">站點</span>
    </div>

    <div class="nav-item" id="navWeather" data-panel="weather" onclick="showWeatherModal()" style="cursor:pointer">
      <span class="nav-icon" style="line-height:0"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" role="img" aria-label="Sunny"><defs><radialGradient id="sg" cx="40%" cy="35%" r="65%"><stop offset="0%" stop-color="#FFFDE7"/><stop offset="35%" stop-color="#FFE082"/><stop offset="70%" stop-color="#FFB74D"/><stop offset="100%" stop-color="#FF8F00"/></radialGradient><filter id="sglow" x="-40%" y="-40%" width="180%" height="180%"><feGaussianBlur in="SourceGraphic" stdDeviation="1.2" result="blur"/><feMerge><feMergeNode in="blur"/><feMergeNode in="SourceGraphic"/></feMerge></filter><style>.sr{transform-origin:12px 12px;animation:sray 6s ease-in-out infinite}.rp{animation:rpulse 3s ease-in-out infinite}.rp:nth-child(1){animation-delay:0s}.rp:nth-child(2){animation-delay:.4s}.rp:nth-child(3){animation-delay:.8s}.rp:nth-child(4){animation-delay:1.2s}.rp:nth-child(5){animation-delay:1.6s}.rp:nth-child(6){animation-delay:2s}.rp:nth-child(7){animation-delay:2.4s}.rp:nth-child(8){animation-delay:2.8s}@keyframes sray{0%{opacity:.85;transform:rotate(0deg)scale(1)}30%{opacity:1;transform:rotate(3deg)scale(1.04)}50%{opacity:.9;transform:rotate(0deg)scale(1)}70%{opacity:1;transform:rotate(-3deg)scale(1.04)}100%{opacity:.85;transform:rotate(0deg)scale(1)}}@keyframes rpulse{0%,100%{opacity:.5}50%{opacity:.9}}</style></defs><circle cx="12" cy="12" r="5.5" fill="url(#sg)" filter="url(#sglow)"/><g class="sr"><line class="rp" x1="12" y1="2.8" x2="12" y2="1.4" stroke="#FFCA28" stroke-width="1.3" stroke-linecap="round"/><line class="rp" x1="18.9" y1="5.1" x2="19.7" y2="4.1" stroke="#FFCA28" stroke-width="1.3" stroke-linecap="round"/><line class="rp" x1="21.2" y1="12" x2="22.6" y2="12" stroke="#FFCA28" stroke-width="1.3" stroke-linecap="round"/><line class="rp" x1="18.9" y1="18.9" x2="19.7" y2="19.9" stroke="#FFCA28" stroke-width="1.3" stroke-linecap="round"/><line class="rp" x1="12" y1="21.2" x2="12" y2="22.6" stroke="#FFCA28" stroke-width="1.3" stroke-linecap="round"/><line class="rp" x1="5.1" y1="18.9" x2="4.3" y2="19.9" stroke="#FFCA28" stroke-width="1.3" stroke-linecap="round"/><line class="rp" x1="2.8" y1="12" x2="1.4" y2="12" stroke="#FFCA28" stroke-width="1.3" stroke-linecap="round"/><line class="rp" x1="5.1" y1="5.1" x2="4.3" y2="4.1" stroke="#FFCA28" stroke-width="1.3" stroke-linecap="round"/></g></svg></span>
      <span class="nav-label">天氣</span>
    </div>
    <div class="nav-item" id="navCalendar" data-panel="calendar" onclick="window.location.href='calendar.html'" style="cursor:pointer">
      <span class="nav-icon" id="calIconContainer" style="line-height:0;display:inline-flex;align-items:center;justify-content:center"><div class="cal-icon" id="calIcon"><div class="cal-month" id="calMonth"></div><div class="cal-day" id="calDay"></div></div></span>
      <span class="nav-label">行事曆</span>
    </div>
  </div>
</nav>

<!-- Station Picker Modal -->
<div class="modal-overlay" id="stationModal">
  <div class="modal-sheet">
    <div class="modal-handle"></div>
    <div class="modal-title">選擇車站</div>
    <div class="station-list" id="stationList"></div>
  </div>
</div>


<!-- Weather Modal -->
<div class="modal fade" id="weatherModal" tabindex="-1" aria-labelledby="weatherModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="weatherModalLabel">
          <span>☀️</span>
          天氣資訊
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <!-- Temperature Header -->
        <div class="weather-modal-header">
          <div class="weather-temp-display">
            <span class="weather-temp-value" id="temperatureValue">--</span>
            <span class="weather-temp-unit">°C</span>
          </div>
          <div class="weather-place" id="temperaturePlace">--</div>
          <div class="weather-time" id="temperatureTime">更新時間：載入中...</div>
        </div>

        <!--☀️ 天氣概況 -->
        <div class="weather-card" data-type="general">
          <div class="weather-card-header">
            <span class="weather-card-icon">☀️</span>
            <span>天氣概況</span>
          </div>
          <div class="weather-card-body" id="weatherGeneral">
            <div class="skeleton-line w-full"></div>
            <div class="skeleton-line w-7"></div>
            <div class="skeleton-line w-5 short"></div>
          </div>
        </div>

        <!-- 🌤️ 今日預報 -->
        <div class="weather-card" data-type="forecast">
          <div class="weather-card-header">
            <span class="weather-card-icon">🌤️</span>
            <span>今日預報</span>
          </div>
          <div class="weather-card-body" id="weatherForecast">
            <div class="skeleton-line w-full"></div>
            <div class="skeleton-line w-7"></div>
            <div class="skeleton-line w-5 short"></div>
          </div>
        </div>

        <!-- 🔮 未來展望 -->
        <div class="weather-card" data-type="outlook">
          <div class="weather-card-header">
            <span class="weather-card-icon">🔮</span>
            <span>未來展望</span>
          </div>
          <div class="weather-card-body" id="weatherOutlook">
            <div class="skeleton-line w-full"></div>
            <div class="skeleton-line w-7"></div>
          </div>
        </div>

        <!-- 📅 行事曆 -->
        <div class="weather-card" data-type="calendar">
          <div class="weather-card-header">
            <span class="weather-card-icon">📅</span>
            <span>百周年未來三日事項</span>
          </div>
          <div class="weather-card-body">
            <div class="calendar-container" id="calendar-container">
              <div class="skeleton-line w-full"></div>
              <div class="skeleton-line w-5 short"></div>
              <div class="skeleton-line w-7"></div>
              <div class="skeleton-line w-3 short"></div>
            </div>
            <div class="calendar-empty" id="calendarNoDataMessage" style="display:none">
              暫無行事曆資料
            </div>
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

<script>
// ── Route Color Map ──
const ROUTE_COLORS = {
  '505':'#8B4513','507':'#8E44AD','610':'#FF6B35','614':'#F1C40F',
  '615':'#27AE60','705':'#F39C12','751':'#3498DB','761P':'#1ABC9C'
};
function routeColor(r){return ROUTE_COLORS[r]||'#6366f1'}
function routeTextColor(r){return r==='614'?'#111':'#fff'}

// ── Station Data ──
const STATIONS = [
  {id:'220',name:'大興(南)'},{id:'100',name:'兆康'},{id:'295',name:'屯門'},
  {id:'280',name:'市中心'},{id:'270',name:'安定'},{id:'560',name:'水邊圍'},
  {id:'570',name:'豐年路'},{id:'580',name:'康樂路'},{id:'590',name:'大棠路'},
  {id:'600',name:'元朗'},{id:'430',name:'天水圍'},{id:'460',name:'天瑞'},
  {id:'480',name:'天富'},{id:'468',name:'頌富'}
];
// ── LRT Stations with GPS (for auto-detect) ──
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
    "080": { id: '080', name: '澤豐', lat: 22.404192792969063, lng: 113.97606465419265 },
};
function getDistance(lat1, lng1, lat2, lng2) {
    const R = 6371;
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLng = (lng2 - lng1) * Math.PI / 180;
    const a = Math.sin(dLat / 2) ** 2 + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * Math.sin(dLng / 2) ** 2;
    return 2 * R * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
}
function findNearestStation(userLat, userLng) {
    let nearest = LRT_STATIONS['220'], minD = Infinity;
    for (const id in LRT_STATIONS) {
        const d = getDistance(userLat, userLng, LRT_STATIONS[id].lat, LRT_STATIONS[id].lng);
        if (d < minD) { minD = d; nearest = LRT_STATIONS[id]; }
    }
    return nearest;
}


// ── Destination → Direction mapping ──
const TUEN_MUN_KEYWORDS = ['屯門碼頭','Tuen Mun Ferry'];
const YUEN_LONG_KEYWORDS = ['元朗','Yuen Long','天水圍','Tin Shui Wai','田景','Tin King','朗屏','Long Ping'];

function getDirection(destCh) {
  const d = destCh || '';
  if (TUEN_MUN_KEYWORDS.some(k => d.includes(k))) return 'tuenmun';
  if (YUEN_LONG_KEYWORDS.some(k => d.includes(k))) return 'yuenlong';
  return 'other';
}

// ── Time Parsing ──
function parseMins(timeStr) {
  const m = String(timeStr).match(/(\d+)/);
  return m ? parseInt(m[1]) : null;
}

// ── State ──
let currentSid = '220';
let currentSname = '大興(南)';
let cache = null;
let cacheTime = 0;
let countdownTimer = null;
let refreshTimer = null;
let isOffline = false;
let lastFetchTime = null;
const CACHE_TTL = 30000;
const REFRESH_INTERVAL = 30000;

// ── Favorites ──
const FAV_KEY = 'lrt_favorites';
function getFavorites(){try{return JSON.parse(localStorage.getItem(FAV_KEY)||'[]')}catch{return []}}
function saveFavorites(favs){localStorage.setItem(FAV_KEY,JSON.stringify(favs))}
function toggleFavorite(sid,sname){
  const favs=getFavorites();
  const idx=favs.findIndex(f=>f.id===sid);
  if(idx>=0){favs.splice(idx,1)}else{favs.push({id:sid,name:sname})}
  saveFavorites(favs);
  renderFavBar();
}
function isFav(sid){return getFavorites().some(f=>f.id===sid)}

// ── Render Favorites Bar ──
function renderFavBar(){
  const bar=document.getElementById('favBar');
  const favs=getFavorites();
  if(favs.length===0){
    bar.innerHTML='';
    return;
  }
  let html=favs.map(f=>`<div class="fav-pill${f.id===currentSid?' active':''}" data-sid="${f.id}" data-name="${f.name}"><span class="fav-star">⭐</span>${f.name}</div>`).join('');
  bar.innerHTML=html;
  bar.querySelectorAll('.fav-pill').forEach(p=>{
    p.addEventListener('click',()=>{
      const sid=p.dataset.sid,name=p.dataset.name;
      loadStation(sid,name);
      bar.querySelectorAll('.fav-pill').forEach(x=>x.classList.remove('active'));
      p.classList.add('active');
    });
  });
}

// ── Render Trains ──
function renderTrains(trains, containerId) {
  const container = document.getElementById(containerId);
  if (!container) return;

  if (!trains || trains.length === 0) {
    container.innerHTML = '<div style="padding:1.25rem 1.1rem;text-align:center;color:var(--text-muted);font-size:.85rem">暫無班次</div>';
    return;
  }

  // Group by route
  const byRoute = {};
  trains.forEach(t => {
    const rn = t.route_no;
    if (!byRoute[rn]) byRoute[rn] = [];
    byRoute[rn].push(t);
  });

  let html = '';
  Object.keys(byRoute).forEach(rn => {
    const arrivals = byRoute[rn].slice(0, 3);
    const color = routeColor(rn);
    const tc = routeTextColor(rn);
    const dest = arrivals[0].dest_ch || '';

    html += '<div class="route-group">' +
      '<div class="route-badge" style="background:' + color + ';color:' + tc + '">' + rn + '</div>' +
      '<div class="route-trains">';

    arrivals.forEach(function(t, i) {
      const mins = parseMins(t.time_ch);
      const colorClass = mins === null ? '' : mins < 2 ? 'red' : mins <= 5 ? 'yellow' : 'green';
      const minDisplay = mins !== null ? '' + mins : '--';
      const destSpan = i === 0 ? '<span style="font-weight:700;color:var(--text-secondary);font-size:.85rem;margin-left:.4rem">' + dest + '</span>' : '';
      html += '<div class="train-row">' +
        '<span class="train-countdown ' + colorClass + '">' + minDisplay + '</span>' +
        '<span class="train-unit">分鐘</span>' +
        destSpan +
        '<span class="train-meta">' + (t.train_length === 2 ? '🚃雙卡' : t.train_length === 1 ? '🚇單卡' : '') + '</span>' +
      '</div>';
    });

    html += '</div></div>';
  });

  container.innerHTML = html;
}

// ── Load Station ──
async function loadStation(sid, sname) {
  currentSid = sid;
  currentSname = sname || sid;

  document.getElementById('stationName').textContent = currentSname;
  document.getElementById('loadingState').style.display = 'block';
  document.getElementById('errorState').style.display = 'none';
  document.getElementById('contentArea').style.display = 'none';

  // Use cache if fresh
  const now = Date.now();
  if (cache && cache.sid === sid && cache.time && (now - cacheTime) < CACHE_TTL) {
    processData(cache.data, cache.systemTime);
    return;
  }

  // Try API
  try {
    const resp = await fetch(`https://rt.data.gov.hk/v1/transport/mtr/lrt/getSchedule?station_id=${sid}&_=${now}`);
    if (!resp.ok) throw new Error(`HTTP ${resp.status}`);
    const data = await resp.json();
    cache = { sid, data, systemTime: data.system_time || '' };
    cacheTime = now;
    lastFetchTime = now;
    isOffline = false;
    processData(data, data.system_time || '');
  } catch (err) {
    // Try cache
    if (cache && cache.sid === sid) {
      isOffline = true;
      showOfflineMode(cache.data, cache.systemTime);
    } else {
      showError(err.message || '無法連接');
    }
  }
}

function processData(data, systemTime) {
  document.getElementById('loadingState').style.display = 'none';
  document.getElementById('contentArea').style.display = 'block';
  document.getElementById('errorState').style.display = 'none';

  // Update header
  if (systemTime) {
    document.getElementById('headerTime').textContent = `更新 ${systemTime}`;
  }

  // Update live badge
  const liveBadge = document.getElementById('liveBadge');
  const liveText = document.getElementById('liveText');
  liveBadge.classList.remove('offline-badge');
  liveText.textContent = 'LIVE';

  // Parse platforms
  const platforms = data.platform_list || [];
  const tuenMunTrains = [];
  const yuenLongTrains = [];

  platforms.forEach(p => {
    const routes = p.route_list || [];
    const pid = p.platform_id;
    routes.forEach(r => {
      if (pid == 2) tuenMunTrains.push(r);
      else if (pid == 1) yuenLongTrains.push(r);
    });
  });

  // Render
  renderTrains(tuenMunTrains, 'trainsTuenMun');
  renderTrains(yuenLongTrains, 'trainsYuenLong');

  document.getElementById('countTuenMun').textContent = `${tuenMunTrains.length} 班`;
  document.getElementById('countYuenLong').textContent = `${yuenLongTrains.length} 班`;

  renderFavBar();
  startCountdown();
}

function showOfflineMode(data, systemTime) {
  document.getElementById('loadingState').style.display = 'none';
  document.getElementById('contentArea').style.display = 'block';
  document.getElementById('errorState').style.display = 'none';

  document.getElementById('headerTime').textContent = `離線模式`;

  const liveBadge = document.getElementById('liveBadge');
  liveBadge.classList.add('offline-badge');
  document.getElementById('liveText').textContent = '離線';

  if (systemTime) {
    document.getElementById('headerStatus').textContent = `緩存: ${systemTime}`;
  }

  const platforms = data.platform_list || [];
  const tuenMunTrains = [];
  const yuenLongTrains = [];

  platforms.forEach(p => {
    const routes = p.route_list || [];
    const pid = p.platform_id;
    routes.forEach(r => {
      if (pid == 2) tuenMunTrains.push(r);
      else if (pid == 1) yuenLongTrains.push(r);
    });
  });

  renderTrains(tuenMunTrains, 'trainsTuenMun');
  renderTrains(yuenLongTrains, 'trainsYuenLong');
  document.getElementById('countTuenMun').textContent = `${tuenMunTrains.length} 班`;
  document.getElementById('countYuenLong').textContent = `${yuenLongTrains.length} 班`;
  renderFavBar();
}

function showError(msg) {
  document.getElementById('loadingState').style.display = 'none';
  document.getElementById('contentArea').style.display = 'none';
  document.getElementById('errorState').style.display = 'block';
  document.getElementById('errorTitle').textContent = '無法載入數據';
  document.getElementById('errorDesc').textContent = msg || '請檢查網絡連接後重試';
  document.getElementById('headerStatus').textContent = '❌ 載入失敗';
}

// ── Countdown Timer ──
function startCountdown() {
  if (countdownTimer) clearInterval(countdownTimer);
  let offsetSecs = 0;

  // Track seconds since last fetch for accurate countdown
  if (lastFetchTime) {
    offsetSecs = Math.floor((Date.now() - lastFetchTime) / 1000);
  }

  countdownTimer = setInterval(() => {
    offsetSecs++;
    // Decrement displayed minutes every 60 seconds
    if (offsetSecs % 60 === 0) {
      // Subtract 1 minute from all countdown displays
      document.querySelectorAll('.train-countdown').forEach(el => {
        const val = parseInt(el.textContent);
        if (!isNaN(val) && val > 0) {
          const newVal = val - 1;
          el.textContent = newVal;
          // Update color class
          el.classList.remove('green','yellow','red');
          if (newVal < 2) el.classList.add('red');
          else if (newVal <= 5) el.classList.add('yellow');
          else el.classList.add('green');
        }
      });
    }
  }, 1000);
}

// ── Auto Refresh ──
function scheduleRefresh() {
  if (refreshTimer) clearTimeout(refreshTimer);
  refreshTimer = setTimeout(() => {
    loadStation(currentSid, currentSname);
    scheduleRefresh();
  }, REFRESH_INTERVAL);
}

// ── Station Modal ──
function openStationModal() {
  const modal = document.getElementById('stationModal');
  const list = document.getElementById('stationList');
  const favs = getFavorites();

  list.innerHTML = STATIONS.map(s => {
    const fav = favs.find(f => f.id === s.id);
    return `<div class="station-item" data-sid="${s.id}" data-name="${s.name}">
      <div>
        <div class="station-item-name">${s.name}</div>
        <div class="station-item-id">#${s.id}</div>
      </div>
      <button class="star-btn${fav?' active':''}" data-sid="${s.id}" data-name="${s.name}" style="margin-left:auto">${fav?'★':'☆'}</button>
    </div>`;
  }).join('');

  // Station item click
  list.querySelectorAll('.station-item').forEach(item => {
    item.addEventListener('click', (e) => {
      if (e.target.classList.contains('star-btn')) return;
      const sid = item.dataset.sid, name = item.dataset.name;
      loadStation(sid, name);
      closeStationModal();
    });
  });

  // Star button
  list.querySelectorAll('.star-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const sid = btn.dataset.sid, name = btn.dataset.name;
      toggleFavorite(sid, name);
      // Re-render modal
      const isF = isFav(sid);
      btn.classList.toggle('active', isF);
      btn.textContent = isF ? '★' : '☆';
    });
  });

  modal.classList.add('show');
  document.body.style.overflow = 'hidden';
}

function closeStationModal() {
  document.getElementById('stationModal').classList.remove('show');
  document.body.style.overflow = '';
}

// ── Init ──
function init() {
  // Bottom nav
  document.getElementById('navHome').addEventListener('click', () => {
    document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
    document.getElementById('navHome').classList.add('active');
  });

  document.getElementById('navFav').addEventListener('click', () => {
    const favs = getFavorites();
    if (favs.length === 0) {
      // No favorites - just show message
      openStationModal();
    } else {
      // Switch to first favorite
      loadStation(favs[0].id, favs[0].name);
    }
  });

  document.getElementById('navStations').addEventListener('click', openStationModal);

  // Retry button
  document.getElementById('retryBtn').addEventListener('click', () => {
    loadStation(currentSid, currentSname);
  });

  // Modal backdrop close
  document.getElementById('stationModal').addEventListener('click', (e) => {
    if (e.target === e.currentTarget) closeStationModal();
  });

  // Modal sheet drag to close (touch)
  let touchStartY = 0;
  document.querySelector('.modal-sheet').addEventListener('touchstart', e => {
    touchStartY = e.touches[0].clientY;
  }, { passive: true });
  document.querySelector('.modal-sheet').addEventListener('touchend', e => {
    const delta = e.changedTouches[0].clientY - touchStartY;
    if (delta > 80) closeStationModal();
  }, { passive: true });

  // GPS auto-detect
  document.getElementById('loadingTitle').textContent = '定位中...';
  document.getElementById('loadingDesc').textContent = '正在偵測你的位置';
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition((p) => {
      document.getElementById('loadingTitle').textContent = '載入中...';
      document.getElementById('loadingDesc').textContent = '正在獲取輕鐵數據';
      var n = findNearestStation(p.coords.latitude, p.coords.longitude);
      if (n) { currentSid = n.id; currentSname = n.name; document.getElementById('stationName').textContent = n.name; }
      loadStation(currentSid, currentSname);
    }, function() {
      document.getElementById('loadingTitle').textContent = '載入中...';
      document.getElementById('loadingDesc').textContent = '正在獲取輕鐵數據';
      loadStation('220', '大興(南)');
    }, { timeout: 4000, maximumAge: 60000 });
  } else {
    document.getElementById('loadingTitle').textContent = '載入中...';
    document.getElementById('loadingDesc').textContent = '正在獲取輕鐵數據';
    loadStation('220', '大興(南)');
  }
  scheduleRefresh();
  renderFavBar();
}

document.addEventListener('DOMContentLoaded', init);

// Update calendar icon with current date
(function() {
  const d = new Date();
  const monthEl = document.getElementById('calMonth');
  const dayEl = document.getElementById('calDay');
  if (monthEl) monthEl.textContent = (d.getMonth() + 1) + '月';
  if (dayEl) dayEl.textContent = d.getDate();
})();

// Service Worker
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('sw.js').catch(() => {});
}
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ── Weather Modal Functions ──
let weatherModalAutoHideTimer = null;
let weatherModalScrollTimer = null;
let isUserScrolling = false;
let currentWeatherModal = null;

const translationDict = {
    'January': '一月', 'February': '二月', 'March': '三月', 'April': '四月',
    'May': '五月', 'June': '六月', 'July': '七月', 'August': '八月',
    'September': '九月', 'October': '十月', 'November': '十一月', 'December': '十二月',
    'Monday': '星期一', 'Tuesday': '星期二', 'Wednesday': '星期三', 'Thursday': '星期四',
    'Friday': '星期五', 'Saturday': '星期六', 'Sunday': '星期日',
    'Mon': '一', 'Tue': '二', 'Wed': '三', 'Thu': '四', 'Fri': '五', 'Sat': '六', 'Sun': '日',
    'Day': '日', 'Parents': '家長', 'Days': '日', "Parents' Days": '家長日',
    'Interim Prize-giving Ceremony': '中期頒獎典禮', 'Prize-giving': '頒獎', 'Ceremony': '典禮',
    'PLK Inter-schools Athletics Meet': '保良局校際田徑比賽', 'Athletics': '田徑', 'Meet': '比賽',
    'Swimming Gala': '游泳比賽', 'Gala': '比賽', 'PLK Inter-school Swimming Gala': '保良局校際游泳比賽',
    'After': '後', 'Day after': '翌日', "Day after Parents' Days": '家長日翌日',
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
    "PTA AGM cum F.1 Parents' Day": '家教會週年大會暨中一家長日', 'PTA': '家教會', 'AGM': '週年大會', 'cum': '暨',
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
    "Buddha's Birthday": '佛誕', 'Buddha': '佛', 'Birthday': '誕',
    'Tuen Ng Festival': '端午節', 'Tuen Ng': '端午',
    'National Day': '國慶日', 'National': '國慶',
    'Chung Yeung Festival': '重陽節', 'Chung Yeung': '重陽',
    'Christmas': '聖誕', 'Christmas & New Year Holidays': '聖誕及新年假期',
    'AM': '上午', 'PM': '下午', 'Incl.': '含', 'Fallback': '後備'
};

function translateText(text) {
    if (!text || text.trim() === '') return text;
    if (translationDict[text]) return translationDict[text];
    let translated = text;
    const words = text.split(/(\s+|[-,.&()])/);
    for (let i = 0; i < words.length; i++) {
        const word = words[i].trim();
        if (word && translationDict[word]) words[i] = translationDict[word];
    }
    translated = words.join('');
    if (translated === text) return text;
    return translated;
}

async function fetchCalendarEvents() {
    try {
        const response = await fetch('calendar.ics?_=' + Date.now());
        if (!response.ok) return [];
        const icsText = await response.text();
        return parseICS(icsText);
    } catch (error) {
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
            currentEvent = { summary: '', summary_en: '', description: '', location: '', dtstart: null, dtend: null };
            continue;
        }
        if (line === 'END:VEVENT') {
            if (currentEvent && currentEvent.dtstart) {
                currentEvent.summary_en = currentEvent.summary;
                currentEvent.summary = translateText(currentEvent.summary);
                if (currentEvent.location) currentEvent.location = translateText(currentEvent.location);
                events.push(currentEvent);
            }
            inEvent = false;
            currentEvent = null;
            continue;
        }
        if (!inEvent || !currentEvent) continue;
        if (line.startsWith('SUMMARY:')) currentEvent.summary = line.substring(8).replace(/\\,/g, ',').replace(/\\n/g, ' ').replace(/\\/g, '');
        else if (line.startsWith('LOCATION:')) currentEvent.location = line.substring(9).replace(/\\,/g, ',').replace(/\\n/g, ' ').replace(/\\/g, '');
        else if (line.startsWith('DESCRIPTION:')) currentEvent.description = line.substring(12).replace(/\\n/g, '\n').replace(/\\,/g, ',').replace(/\\/g, '');
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
                currentEvent.dtend.setDate(currentEvent.dtend.getDate() - 1);
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
    return date.getMonth() + 1 + '/' + date.getDate() + ' (' + weekdays[date.getDay()] + ')';
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
            container.innerHTML = '';
            noDataMsg.style.display = 'block';
            return;
        }
        const now = new Date();
        const today = new Date(now.getFullYear(), now.getMonth(), now.getDate());
        const threeDaysLater = new Date(today);
        threeDaysLater.setDate(today.getDate() + 3);
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
                timeStr = startDate + ' - ' + endDate;
            }
            const showOriginal = event.summary_en && event.summary_en !== event.summary;
            html += '<div class="calendar-item ' + eventClass + '"><div class="calendar-date"><i class="bi bi-calendar-event"></i> ' + dateStr + ' (' + timeStr + ')</div><div class="calendar-title">' + (event.summary || '未命名事件') + (showOriginal ? '<span class="translation-badge">EN: ' + event.summary_en + '</span>' : '') + '</div>';
            if (event.description && event.description.trim() !== '') {
                html += '<div class="calendar-desc">' + event.description.replace(/\n/g, '<br>') + '</div>';
            }
            if (event.location && event.location.trim() !== '') {
                html += '<div class="calendar-location"><i class="bi bi-geo-alt"></i> ' + event.location + '</div>';
            }
            html += '</div>';
        });
        container.innerHTML = html;
        noDataMsg.style.display = 'none';
    } catch (error) {
        container.innerHTML = '<div class="text-center py-3" style="color: #ff6b6b;">無法載入行事曆</div>';
        noDataMsg.style.display = 'none';
    }
}

function setupModalAutoClose(modalElement) {
    const modalFooter = modalElement.querySelector('.modal-footer');
    const footerText = modalFooter ? modalFooter.querySelector('#weatherFooterText') : null;
    const updateFooterText = (text) => { if (footerText) footerText.textContent = text; };
    const cancelTimer = () => { if (weatherModalAutoHideTimer) { clearTimeout(weatherModalAutoHideTimer); weatherModalAutoHideTimer = null; } };
    const resetAutoHideTimer = () => {
        cancelTimer();
        weatherModalAutoHideTimer = setTimeout(() => {
            if (currentWeatherModal) { currentWeatherModal.hide(); }
        }, 3000);
        updateFooterText('數據來源：香港天文台 • 3秒後自動關閉');
    };
    const pauseAutoHide = () => {
        cancelTimer();
        updateFooterText('滑鼠懸停，自動關閉已暫停');
    };
    const resumeAutoHide = () => {
        cancelTimer();
        weatherModalAutoHideTimer = setTimeout(() => {
            if (currentWeatherModal) { currentWeatherModal.hide(); }
        }, 5000);
        updateFooterText('數據來源：香港天文台 • 5秒後自動關閉');
    };
    const handleScroll = () => {
        if (!isUserScrolling) { isUserScrolling = true; cancelTimer(); updateFooterText('正在閱讀，自動關閉已暫停'); }
        if (weatherModalScrollTimer) clearTimeout(weatherModalScrollTimer);
        weatherModalScrollTimer = setTimeout(() => { isUserScrolling = false; resumeAutoHide(); }, 1000);
    };
    const handleMouseEnter = () => { cancelTimer(); updateFooterText('滑鼠懸停，自動關閉已暫停'); };
    const handleMouseLeave = () => { resumeAutoHide(); };
    const content = modalElement.querySelector('.modal-content');
    if (content) {
        content.addEventListener('mouseenter', handleMouseEnter);
        content.addEventListener('mouseleave', handleMouseLeave);
        content.addEventListener('touchstart', handleMouseEnter);
        content.addEventListener('touchend', handleMouseLeave);
    }
    const container = document.getElementById('calendar-container');
    if (container) container.addEventListener('scroll', handleScroll);
    resetAutoHideTimer();
}

async function showWeatherModal() {
    if (typeof bootstrap === 'undefined') { setTimeout(showWeatherModal, 500); return; }
    if (weatherModalAutoHideTimer) { clearTimeout(weatherModalAutoHideTimer); weatherModalAutoHideTimer = null; }
    if (weatherModalScrollTimer) { clearTimeout(weatherModalScrollTimer); weatherModalScrollTimer = null; }
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
            fetch('https://data.weather.gov.hk/weatherAPI/opendata/weather.php?dataType=rhrread&lang=tc&_=' + Date.now()).then(r => r.json()),
            fetch('https://data.weather.gov.hk/weatherAPI/opendata/weather.php?dataType=flw&lang=tc&_=' + Date.now()).then(r => r.json())
        ]);
        displayCalendar();
        const tempData = currentData.temperature && currentData.temperature.data ? currentData.temperature.data : [];
        const tmuenTemp = tempData.find(item => item.place === '屯門');
        document.getElementById('temperatureValue').textContent = tmuenTemp ? tmuenTemp.value : '--';
        if (forecastData.generalSituation) document.getElementById('weatherGeneral').textContent = forecastData.generalSituation;
        if (forecastData.forecastDesc) {
            let forecastText = '';
            if (forecastData.forecastPeriod) forecastText += forecastData.forecastPeriod + '\n';
            forecastText += forecastData.forecastDesc;
            document.getElementById('weatherForecast').textContent = forecastText;
        }
        if (forecastData.outlook) document.getElementById('weatherOutlook').textContent = forecastData.outlook;
        const extractTemperatures = (forecastDesc) => {
            if (!forecastDesc) return { min: null, max: null };
            let minTemp = null, maxTemp = null;
            const minMatch = forecastDesc.match(/(?:最低氣溫|最低溫度)約?(\d+)/);
            if (minMatch) minTemp = parseInt(minMatch[1]);
            const maxMatch = forecastDesc.match(/(?:最高氣溫|最高溫度)約?(\d+)/);
            if (maxMatch) maxTemp = parseInt(maxMatch[1]);
            return { min: minTemp, max: maxTemp };
        };
        const temps = extractTemperatures(forecastData.forecastDesc);
        if (temps.min && temps.max) document.getElementById('weatherGeneral').textContent += '\n\n📊 今日溫度：最低 ' + temps.min + '°C，最高 ' + temps.max + '°C';
        const updateTime = forecastData.updateTime || currentData.updateTime;
        if (updateTime) {
            try {
                const time = new Date(updateTime);
                const formattedTime = time.getFullYear() + '-' + String(time.getMonth() + 1).padStart(2, '0') + '-' + String(time.getDate()).padStart(2, '0') + ' ' + String(time.getHours()).padStart(2, '0') + ':' + String(time.getMinutes()).padStart(2, '0');
                document.getElementById('temperatureTime').textContent = '更新時間：' + formattedTime;
            } catch (e) {
                document.getElementById('temperatureTime').textContent = '更新時間：' + updateTime;
            }
        }
        const modalElement = document.getElementById('weatherModal');
        if (currentWeatherModal) currentWeatherModal.hide();
        currentWeatherModal = new bootstrap.Modal(modalElement, { backdrop: 'static', keyboard: false });
        currentWeatherModal.show();
        setupModalAutoClose(modalElement);
    } catch (error) {
        document.getElementById('temperatureValue').textContent = '錯誤';
        document.getElementById('weatherGeneral').textContent = '無法連接天氣伺服器';
        document.getElementById('weatherForecast').textContent = '請檢查網絡連接或稍後再試';
        document.getElementById('weatherOutlook').textContent = '服務暫時不可用';
        document.getElementById('temperatureTime').textContent = '更新時間：失敗';
        displayCalendar();
        const modalElement = document.getElementById('weatherModal');
        const weatherModal = new bootstrap.Modal(modalElement);
        weatherModal.show();
        setTimeout(() => { if (weatherModal) weatherModal.hide(); }, 3000);
    }
}
</script>
</body>
</html>
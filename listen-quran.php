<?php
require_once 'data.php';
$page_title = "Listen Quran Online Free — 230+ Reciters MP3 | Indeed Qur'an";
$page_desc = "Listen to the Holy Quran online free. 230+ reciters including Sudais, Mishary, Minshawi, Al-Hudhaifi. Download Quran MP3. Urdu, English, Bengali, Indonesian translations. No ads ever.";
$page_keywords = "listen quran online, quran mp3 download free, quran audio, sudais quran, mishary quran, minshawi quran, quran with urdu translation, quran bengali, quran indonesian";
$page_url = "https://indeedquran.com/listen-quran/";
require_once 'header.php';
?>
<style>
.page-hero{padding:40px 60px 32px;background:var(--card);border-bottom:1px solid var(--border);}
@media(max-width:700px){.page-hero{padding:24px 18px;}}
.page-h1{font-family:'Cinzel',serif;font-size:36px;font-weight:700;color:var(--text);margin-bottom:8px;}
.page-sub{font-size:16px;color:var(--muted);margin-bottom:24px;line-height:1.6;}
.search-row{display:flex;gap:10px;flex-wrap:wrap;}
.search-box{flex:1;min-width:280px;display:flex;align-items:center;gap:10px;background:var(--navy3);border:1px solid var(--border);border-radius:12px;padding:12px 16px;transition:.2s;}
.search-box:focus-within{border-color:var(--cyan3);}
.search-box input{background:none;border:none;outline:none;color:var(--text);font-size:14px;flex:1;font-family:'Inter',sans-serif;}
.search-box input::placeholder{color:var(--dim);}
.trans-toggle{display:flex;align-items:center;gap:8px;padding:12px 18px;border:1px solid var(--border);border-radius:12px;cursor:pointer;font-size:13px;color:var(--muted);background:var(--card);transition:.2s;white-space:nowrap;}
.trans-toggle:hover,.trans-toggle.on{border-color:var(--cyan3);color:var(--cyan);}
.lang-bar{background:var(--navy3);border-bottom:1px solid var(--border);padding:12px 60px;display:none;flex-wrap:wrap;gap:8px;}
@media(max-width:700px){.lang-bar{padding:12px 18px;}}
.lang-bar.show{display:flex;}
.lc{padding:6px 16px;border-radius:20px;font-size:12px;border:1px solid var(--border);cursor:pointer;color:var(--muted);background:var(--card);transition:.2s;}
.lc.on,.lc:hover{background:var(--cyan2);color:var(--cyan);border-color:var(--cyan3);}
.content-wrap{display:grid;grid-template-columns:300px 1fr;min-height:calc(100vh - 68px - 120px);}
@media(max-width:860px){.content-wrap{grid-template-columns:1fr;}}
.rc-panel{background:var(--card);border-right:1px solid var(--border);overflow-y:auto;max-height:calc(100vh - 68px - 120px);}
.rc-panel::-webkit-scrollbar{width:3px;}
.rc-panel::-webkit-scrollbar-thumb{background:rgba(0,200,232,.2);border-radius:2px;}
.feat-wrap{padding:14px 14px 8px;}
.feat-lbl{font-size:10px;color:var(--dim);letter-spacing:.08em;margin-bottom:10px;font-family:'Cinzel',serif;}
.feat-card{border:1px solid var(--cyan3);border-radius:13px;padding:14px;cursor:pointer;background:var(--cyan2);margin-bottom:10px;text-decoration:none;display:block;transition:.2s;}
.feat-card:hover{background:rgba(0,200,232,.18);}
.feat-row{display:flex;align-items:center;gap:11px;}
.feat-av{width:44px;height:44px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0;border:2px solid var(--cyan);}
.feat-av.v1{background:rgba(0,80,100,.3);color:var(--cyan);}
.feat-av.v2{background:rgba(0,40,100,.3);color:#88aaff;}
.feat-name{font-size:13px;font-weight:600;color:var(--text);}
.feat-sub{font-size:11px;color:var(--muted);margin-top:2px;}
.feat-badge{display:inline-block;font-size:9px;background:rgba(0,200,232,.15);color:var(--cyan);border-radius:4px;padding:2px 8px;margin-top:4px;}
.rc-lbl{font-size:10px;color:var(--dim);letter-spacing:.08em;padding:10px 16px 5px;font-family:'Cinzel',serif;}
.rc-item{display:flex;align-items:center;gap:11px;padding:10px 16px;cursor:pointer;border-left:3px solid transparent;transition:.15s;text-decoration:none;}
.rc-item:hover{background:rgba(0,200,232,.04);}
.rc-item.sel{background:var(--cyan2);border-left-color:var(--cyan);}
.rc-av{width:42px;height:42px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;flex-shrink:0;border:1px solid rgba(0,200,232,.2);}
.rc-name{font-size:13px;color:var(--text);font-weight:500;}
.rc-sub{font-size:10px;color:var(--muted);margin-top:1px;}
.rc-mosque{font-size:9px;color:var(--cyan);margin-top:2px;}
.surah-panel{display:flex;flex-direction:column;background:var(--navy);}
body.light .surah-panel{background:#e8edf2;}
.surah-head{background:var(--card);padding:14px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;}
.sh-title{font-family:'Cinzel',serif;font-size:16px;color:var(--text);}
.sh-sub{font-size:12px;color:var(--muted);margin-top:3px;}
.sh-info{font-size:12px;color:var(--cyan);background:var(--cyan2);border-radius:8px;padding:6px 14px;border:1px solid var(--cyan3);}
.surah-list{overflow-y:auto;flex:1;}
.surah-list::-webkit-scrollbar{width:3px;}
.surah-list::-webkit-scrollbar-thumb{background:rgba(0,200,232,.2);border-radius:2px;}
.s-item{display:flex;align-items:center;padding:12px 24px;border-bottom:0.5px solid var(--border);gap:14px;transition:.15s;}
.s-item:hover{background:rgba(0,200,232,.03);}
.s-item.playing{background:rgba(0,200,232,.06);}
.s-num{width:30px;height:30px;border-radius:50%;background:var(--navy3);display:flex;align-items:center;justify-content:center;font-size:11px;color:var(--dim);flex-shrink:0;}
.s-item.playing .s-num{background:rgba(0,200,232,.2);color:var(--cyan);}
.s-ar{font-family:'Scheherazade New',serif;font-size:19px;color:var(--text);flex:1;text-align:right;direction:rtl;}
.s-en{font-size:13px;color:var(--muted);flex:1.2;}
.s-actions{display:flex;gap:8px;flex-shrink:0;}
.s-play{width:32px;height:32px;border-radius:50%;background:var(--cyan2);border:1px solid var(--cyan3);display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--cyan);font-size:11px;transition:.2s;}
.s-item.playing .s-play{background:var(--cyan);color:#0A0E1A;}
.s-dl{width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,.04);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--dim);font-size:11px;transition:.2s;text-decoration:none;}
.s-dl:hover{border-color:var(--cyan3);color:var(--cyan);}
.player{background:var(--card);border-top:1.5px solid var(--cyan3);padding:14px 24px 12px;}
.pl-top{display:flex;align-items:center;gap:12px;margin-bottom:10px;flex-wrap:wrap;gap:10px;}
.pl-av{width:38px;height:38px;border-radius:50%;background:rgba(0,80,100,.3);border:1.5px solid var(--cyan);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:var(--cyan);flex-shrink:0;}
.pl-info{flex:1;}
.pl-rc{font-size:14px;font-weight:600;color:var(--cyan);}
.pl-su{font-size:11px;color:var(--muted);margin-top:2px;}
.pl-ctrls{display:flex;align-items:center;gap:10px;}
.pl-btn{width:30px;height:30px;border-radius:50%;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12px;color:var(--muted);background:none;transition:.2s;}
.pl-btn:hover{border-color:var(--cyan3);color:var(--text);}
.pl-play{width:44px;height:44px;border-radius:50%;background:var(--cyan2);border:1.5px solid var(--cyan);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:.2s;}
.pl-play:hover{background:rgba(0,200,232,.22);}
.pl-tri{width:0;height:0;border-style:solid;border-width:9px 0 9px 16px;border-color:transparent transparent transparent var(--cyan);margin-left:3px;}
.pl-pause{display:flex;gap:4px;}.pl-pb{width:4px;height:16px;background:var(--cyan);border-radius:2px;}
.prog-wrap{display:flex;align-items:center;gap:10px;margin-bottom:8px;}
.prog{flex:1;height:4px;background:rgba(0,200,232,.12);border-radius:2px;cursor:pointer;position:relative;}
.prog:hover{height:6px;}
.prog-fill{height:100%;background:var(--cyan);border-radius:2px;width:0%;}
.prog-dot{width:10px;height:10px;border-radius:50%;background:var(--cyan);position:absolute;top:50%;left:0%;transform:translate(-50%,-50%);}
.time{font-size:11px;color:var(--dim);min-width:32px;font-variant-numeric:tabular-nums;}
.extra-row{display:flex;align-items:center;gap:10px;flex-wrap:wrap;}
.vol-row{display:flex;align-items:center;gap:6px;flex:1;min-width:120px;}
.vol-sl{flex:1;accent-color:var(--cyan);}
.vol-ic{font-size:12px;color:var(--dim);}
.spd{font-size:11px;padding:4px 10px;border-radius:20px;border:1px solid var(--border);color:var(--muted);cursor:pointer;transition:.2s;}
.spd.on{border-color:var(--cyan3);color:var(--cyan);background:var(--cyan2);}
.rep-btn{font-size:11px;padding:4px 10px;border-radius:20px;border:1px solid var(--border);color:var(--muted);cursor:pointer;transition:.2s;}
.rep-btn.on{border-color:var(--cyan3);color:var(--cyan);}
/* SEO content */
.seo-section{padding:48px 60px;border-top:1px solid var(--border);}
@media(max-width:700px){.seo-section{padding:28px 18px;}}
.seo-h2{font-family:'Cinzel',serif;font-size:24px;color:var(--text);margin-bottom:16px;}
.seo-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:10px;margin-bottom:28px;}
.seo-link{background:var(--card);border-radius:10px;padding:12px 16px;border:1px solid var(--border);text-decoration:none;transition:.2s;}
.seo-link:hover{border-color:var(--cyan3);}
.seo-link-t{font-size:13px;color:var(--text);font-weight:500;}
.seo-link-s{font-size:11px;color:var(--muted);margin-top:3px;}
</style>

<div class="page-hero">
  <h1 class="page-h1">Listen Quran</h1>
  <p class="page-sub">230+ world-famous reciters. Listen and download Quran MP3 free. Urdu, English, Bengali, Indonesian translations available.</p>
  <div class="search-row">
    <div class="search-box">
      <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="opacity:.4"><circle cx="11" cy="11" r="7"/><path d="m16.5 16.5 4 4"/></svg>
      <input id="rcSearch" placeholder="Search your favourite reciter..." oninput="filterRc(this.value)" autocomplete="off">
    </div>
    <div class="trans-toggle" id="transToggle" onclick="toggleLang()">
      🌐 Translation / Language
      <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m6 9 6 6 6-6"/></svg>
    </div>
  </div>
</div>

<div class="lang-bar" id="langBar">
  <div class="lc on" onclick="selectLang('ar',this)">🇸🇦 Arabic</div>
  <div class="lc" onclick="selectLang('ur',this)">🇵🇰 Urdu</div>
  <div class="lc" onclick="selectLang('en',this)">🇬🇧 English</div>
  <div class="lc" onclick="selectLang('bn',this)">🇧🇩 Bengali</div>
  <div class="lc" onclick="selectLang('id',this)">🇮🇩 Indonesian</div>
  <div class="lc" onclick="selectLang('fr',this)">🇫🇷 French</div>
  <div class="lc" onclick="selectLang('tl',this)">🇵🇭 Filipino</div>
  <div class="lc" onclick="selectLang('tr',this)">🇹🇷 Turkish</div>
  <div class="lc" onclick="selectLang('de',this)">🇩🇪 German</div>
  <div class="lc" onclick="selectLang('ru',this)">🇷🇺 Russian</div>
  <div class="lc" onclick="selectLang('ms',this)">🇲🇾 Malay</div>
  <div class="lc" onclick="selectLang('fa',this)">🇮🇷 Farsi</div>
  <div class="lc" onclick="selectLang('zh',this)">🇨🇳 Chinese</div>
</div>

<div class="content-wrap">
  <div class="rc-panel" id="rcPanel">
    <div class="feat-wrap">
      <div class="feat-lbl">FEATURED RECITERS</div>
      <?php foreach($reciters as $r): if(!$r['featured']) continue; ?>
      <a class="feat-card" href="/listen-quran/reciter/<?= $r['slug'] ?>/" onclick="pickReciter(event,'<?= $r['slug'] ?>','<?= addslashes($r['name']) ?>','<?= $r['type'] ?>','<?= $r['server'] ?>','<?= strtoupper(substr($r['name'],0,1)).strtoupper(substr(explode(' ',$r['name'])[1]??'',0,1)) ?>')">
        <div class="feat-row">
          <div class="feat-av <?= $r['type']==='Mujawwad'?'v2':'v1' ?>"><?= strtoupper(substr($r['name'],0,1)).strtoupper(substr(explode(' ',$r['name'])[1]??'',0,1)) ?></div>
          <div>
            <div class="feat-name"><?= htmlspecialchars($r['name']) ?></div>
            <div class="feat-sub"><?= htmlspecialchars($r['type']) ?></div>
            <span class="feat-badge"><?= $r['type'] === 'Mujawwad' ? 'Mujawwad version' : 'Murattal version' ?></span>
          </div>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
    <div class="rc-lbl" id="rcCountLbl">ALL RECITERS</div>
    <div id="rcList">
      <?php foreach($reciters as $r): if($r['featured']) continue;
        $ini = strtoupper(substr($r['name'],0,1)).strtoupper(substr(explode(' ',$r['name'])[1]??'',0,1));
        $colors = ['#0a2a4a','#0a3a1a','#3a0a0a','#1a0a3a','#0a2a2a','#2a1a0a'];
        static $ci=0; $clr=$colors[$ci%6]; $ci++;
      ?>
      <a class="rc-item" href="/listen-quran/reciter/<?= $r['slug'] ?>/" onclick="pickReciter(event,'<?= $r['slug'] ?>','<?= addslashes($r['name']) ?>','<?= $r['type'] ?>','<?= $r['server'] ?>','<?= $ini ?>')">
        <div class="rc-av" style="background:<?= $clr ?>"><?= $ini ?></div>
        <div>
          <div class="rc-name"><?= htmlspecialchars($r['name']) ?></div>
          <div class="rc-sub"><?= htmlspecialchars($r['type']) ?></div>
          <?php if($r['mosque']): ?><div class="rc-mosque"><?= htmlspecialchars($r['mosque']) ?></div><?php endif; ?>
        </div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="surah-panel">
    <div class="surah-head">
      <div>
        <div class="sh-title" id="shTitle">Select a reciter to begin</div>
        <div class="sh-sub" id="shSub">Choose from the list — then tap any Surah to play instantly</div>
      </div>
      <div class="sh-info" id="shInfo">114 Surahs Available</div>
    </div>
    <div class="surah-list" id="surahList">
      <?php foreach($surahs as $num => $s): ?>
      <div class="s-item" id="si<?= $num ?>" onclick="playSurah(<?= $num ?>,'<?= addslashes($s['en']) ?>',this)">
        <div class="s-num"><?= $num ?></div>
        <div class="s-ar"><?= $s['ar'] ?></div>
        <div class="s-en"><?= $s['en'] ?></div>
        <div class="s-actions">
          <div class="s-play" id="sp<?= $num ?>">▶</div>
          <a class="s-dl" id="dl<?= $num ?>" href="#" onclick="dlSurah(event,<?= $num ?>,'<?= addslashes($s['en']) ?>')" title="Download <?= $s['en'] ?> MP3">⬇</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="player">
      <div class="pl-top">
        <div class="pl-av" id="plAv">—</div>
        <div class="pl-info">
          <div class="pl-rc" id="plRc">Select a reciter first</div>
          <div class="pl-su" id="plSu">Then tap any Surah above ▶</div>
        </div>
        <div class="pl-ctrls">
          <button class="pl-btn" onclick="prevSurah()">⏮</button>
          <button class="pl-btn" onclick="seekBack()">⏪</button>
          <div class="pl-play" onclick="togglePlay()"><div id="playIcon"><div class="pl-tri"></div></div></div>
          <button class="pl-btn" onclick="seekFwd()">⏩</button>
          <button class="pl-btn" onclick="nextSurah()">⏭</button>
        </div>
      </div>
      <div class="prog-wrap">
        <span class="time" id="tCur">0:00</span>
        <div class="prog" onclick="seekTo(event,this)"><div class="prog-fill" id="progFill"></div><div class="prog-dot" id="progDot"></div></div>
        <span class="time" id="tDur">--:--</span>
      </div>
      <div class="extra-row">
        <div class="vol-row"><span class="vol-ic">🔉</span><input type="range" class="vol-sl" id="volSl" min="0" max="1" step="0.05" value="0.85" oninput="setVol(this.value)"><span class="vol-ic">🔊</span></div>
        <div class="spd" onclick="setSpd(0.75,this)">0.75×</div>
        <div class="spd on" onclick="setSpd(1,this)">1×</div>
        <div class="spd" onclick="setSpd(1.25,this)">1.25×</div>
        <div class="spd" onclick="setSpd(1.5,this)">1.5×</div>
        <div class="rep-btn" id="repBtn" onclick="toggleRep()">↻ Repeat</div>
      </div>
    </div>
  </div>
</div>

<!-- SEO Section — helps Google rank this page -->
<div class="seo-section">
  <h2 class="seo-h2">Listen Quran by Surah</h2>
  <div class="seo-grid">
    <?php foreach($surahs as $num => $s): ?>
    <a class="seo-link" href="/surah/<?= $s['slug'] ?>/">
      <div class="seo-link-t"><?= $s['en'] ?> — <?= $s['ar'] ?></div>
      <div class="seo-link-s">Surah <?= $num ?> • <?= $s['ayahs'] ?> ayahs • <?= $s['type'] ?></div>
    </a>
    <?php endforeach; ?>
  </div>
  <h2 class="seo-h2">Listen Quran by Reciter</h2>
  <div class="seo-grid">
    <?php foreach($reciters as $r): ?>
    <a class="seo-link" href="/listen-quran/reciter/<?= $r['slug'] ?>/">
      <div class="seo-link-t"><?= htmlspecialchars($r['name']) ?></div>
      <div class="seo-link-s"><?= $r['type'] ?><?= $r['mosque'] ? ' • '.$r['mosque'] : '' ?></div>
    </a>
    <?php endforeach; ?>
  </div>
</div>

<script>
var auEl=null,auPlaying=false,auRepeat=false,auSpd=1;
var curRcName='',curRcServer='',curRcAv='',curSurahNum=0,curSurahName='';
var allApiRc=[];

// Load extra reciters from API
fetch('https://www.mp3quran.net/api/v3/reciters?language=eng')
  .then(r=>r.json())
  .then(d=>{allApiRc=d.reciters||[];appendApiRc(allApiRc);})
  .catch(()=>{});

function appendApiRc(list){
  var el=document.getElementById('rcList');
  var colors=['#0a2a4a','#0a3a1a','#3a0a0a','#1a0a3a','#0a2a2a','#2a1a0a','#0a1a3a','#2a0a1a'];
  var extra='<div class="rc-lbl">FROM MP3QURAN.NET — '+list.length+' RECITERS</div>';
  list.forEach(function(r,i){
    var p=r.name.split(' ').filter(w=>w.length>2);
    var ini=p.length>=2?(p[0][0]+p[1][0]).toUpperCase():r.name.slice(0,2).toUpperCase();
    var srv=r.moshaf&&r.moshaf[0]?r.moshaf[0].server:'';
    var sub=r.moshaf&&r.moshaf[0]?r.moshaf[0].name.split('-')[0].trim():'';
    var clr=colors[i%colors.length];
    extra+='<div class="rc-item" onclick="pickReciterDirect(\''+r.name.replace(/'/g,"\\'")+ '\',\''+sub.replace(/'/g,"\\'")+'\',\''+srv+'\',\''+ini+'\')">';
    extra+='<div class="rc-av" style="background:'+clr+'">'+ini+'</div>';
    extra+='<div><div class="rc-name">'+r.name+'</div><div class="rc-sub">'+sub+'</div></div></div>';
  });
  el.innerHTML+=extra;
  document.getElementById('rcCountLbl').textContent='ALL RECITERS — '+(list.length+<?= count(array_filter($reciters,fn($r)=>!$r['featured'])) ?>)+' TOTAL';
}

function filterRc(q){
  document.querySelectorAll('.rc-item,.feat-card').forEach(function(el){
    var name=el.querySelector('.rc-name,.feat-name');
    if(!name)return;
    el.style.display=(!q||name.textContent.toLowerCase().includes(q.toLowerCase()))?'':'none';
  });
}

function toggleLang(){
  var lb=document.getElementById('langBar');
  var bt=document.getElementById('transToggle');
  lb.classList.toggle('show');
  bt.classList.toggle('on');
}

var curLang='ar';
function selectLang(lang,el){
  curLang=lang;
  document.querySelectorAll('.lc').forEach(c=>c.classList.remove('on'));
  el.classList.add('on');
  // Load reciters for this language from API
  if(lang!=='ar'){
    fetch('https://www.mp3quran.net/api/v3/reciters?language='+lang)
      .then(r=>r.json())
      .then(d=>{
        var list=d.reciters||[];
        if(list.length>0){
          var el2=document.getElementById('rcList');
          el2.innerHTML='<div class="rc-lbl">'+el.textContent.trim()+' RECITERS — '+list.length+' AVAILABLE</div>';
          var colors=['#0a2a4a','#0a3a1a','#3a0a0a','#1a0a3a','#0a2a2a','#2a1a0a'];
          list.forEach(function(r,i){
            var p=r.name.split(' ').filter(w=>w.length>2);
            var ini=p.length>=2?(p[0][0]+p[1][0]).toUpperCase():r.name.slice(0,2).toUpperCase();
            var srv=r.moshaf&&r.moshaf[0]?r.moshaf[0].server:'';
            var sub=r.moshaf&&r.moshaf[0]?r.moshaf[0].name.split('-')[0].trim():'';
            el2.innerHTML+='<div class="rc-item" onclick="pickReciterDirect(\''+r.name.replace(/'/g,"\\'")+'\',\''+sub.replace(/'/g,"\\'")+'\',\''+srv+'\',\''+ini+'\')">'+'<div class="rc-av" style="background:'+colors[i%6]+'">'+ini+'</div><div><div class="rc-name">'+r.name+'</div><div class="rc-sub">'+sub+'</div></div></div>';
          });
        }
      })
      .catch(()=>{});
  } else {
    location.reload();
  }
}

function pickReciter(e,slug,name,type,server,ini){
  e.preventDefault();
  pickReciterDirect(name,type,server,ini);
  window.history.pushState({},'','/listen-quran/reciter/'+slug+'/');
}

function pickReciterDirect(name,type,server,ini){
  curRcName=name;curRcServer=server;curRcAv=ini;
  document.querySelectorAll('.rc-item').forEach(r=>r.classList.remove('sel'));
  document.getElementById('shTitle').textContent=name;
  document.getElementById('shSub').textContent=type+' — Tap any Surah to play instantly ▶';
  document.getElementById('shInfo').textContent='114 Surahs';
  document.getElementById('plRc').textContent=name;
  document.getElementById('plSu').textContent='Tap any Surah above ▶';
  document.getElementById('plAv').textContent=ini;
  if(auEl){auEl.pause();auEl=null;}setPlay(false);resetProg();
}

function playSurah(num,name,el){
  if(!curRcServer){document.getElementById('plSu').textContent='← Select a reciter first';return;}
  document.querySelectorAll('.s-item').forEach(s=>{s.classList.remove('playing');s.querySelector('.s-play').textContent='▶';});
  el.classList.add('playing');el.querySelector('.s-play').textContent='⏸';
  curSurahNum=num;curSurahName=name;
  document.getElementById('plSu').textContent='Surah '+name+' • Loading...';
  if(auEl){auEl.pause();auEl=null;}setPlay(false);resetProg();
  var n=String(num).padStart(3,'0');
  var url=curRcServer+n+'.mp3';
  auEl=new Audio(url);auEl.playbackRate=auSpd;auEl.volume=parseFloat(document.getElementById('volSl').value);
  auEl.addEventListener('loadedmetadata',()=>{document.getElementById('tDur').textContent=fmt(auEl.duration);});
  auEl.addEventListener('timeupdate',()=>{
    if(!auEl.duration)return;
    var pct=(auEl.currentTime/auEl.duration)*100;
    document.getElementById('progFill').style.width=pct+'%';
    document.getElementById('progDot').style.left=pct+'%';
    document.getElementById('tCur').textContent=fmt(auEl.currentTime);
  });
  auEl.addEventListener('playing',()=>{setPlay(true);document.getElementById('plSu').textContent='Surah '+name+' • Playing';});
  auEl.addEventListener('pause',()=>setPlay(false));
  auEl.addEventListener('ended',()=>{setPlay(false);if(auRepeat){auEl.currentTime=0;auEl.play();}else{autoNext();}});
  auEl.addEventListener('error',()=>{
    if(url.includes('quranicaudio')){
      var fb='https://server11.mp3quran.net/sds/'+n+'.mp3';
      auEl=new Audio(fb);auEl.playbackRate=auSpd;
      auEl.addEventListener('playing',()=>{setPlay(true);document.getElementById('plSu').textContent='Surah '+name+' • Playing';});
      auEl.addEventListener('error',()=>{document.getElementById('plSu').textContent='Could not load — check connection';setPlay(false);});
      auEl.play().catch(()=>{});
    }else{document.getElementById('plSu').textContent='Could not load — try another reciter';setPlay(false);}
  });
  auEl.play().catch(()=>{document.getElementById('plSu').textContent='Surah '+name+' • Tap ▶ to play';setPlay(false);});
  // Update download link
  document.getElementById('dl'+num).href=url;
  document.getElementById('dl'+num).download='Indeed-Quran-Surah-'+name+'.mp3';
}

function dlSurah(e,num,name){
  if(!curRcServer){e.preventDefault();document.getElementById('plSu').textContent='← Select a reciter first to download';return;}
  var n=String(num).padStart(3,'0');
  var a=document.getElementById('dl'+num);
  a.href=curRcServer+n+'.mp3';
  a.download='Indeed-Quran-Surah-'+name+'-'+curRcName+'.mp3';
}

function autoNext(){
  if(curSurahNum<114){
    var next=document.getElementById('si'+(curSurahNum+1));
    if(next)next.click();
  }
}

function togglePlay(){
  if(!auEl){if(curSurahNum>0&&curRcServer){var el=document.getElementById('si'+curSurahNum);if(el)el.click();}return;}
  if(auEl.paused)auEl.play().then(()=>setPlay(true));else{auEl.pause();setPlay(false);}
}
function setPlay(p){auPlaying=p;document.getElementById('playIcon').innerHTML=p?'<div class="pl-pause"><div class="pl-pb"></div><div class="pl-pb"></div></div>':'<div class="pl-tri"></div>';}
function resetProg(){document.getElementById('progFill').style.width='0%';document.getElementById('progDot').style.left='0%';document.getElementById('tCur').textContent='0:00';document.getElementById('tDur').textContent='--:--';}
function seekBack(){if(auEl)auEl.currentTime=Math.max(0,auEl.currentTime-10);}
function seekFwd(){if(auEl&&auEl.duration)auEl.currentTime=Math.min(auEl.duration,auEl.currentTime+10);}
function prevSurah(){if(curSurahNum>1){var el=document.getElementById('si'+(curSurahNum-1));if(el)el.click();}}
function nextSurah(){if(curSurahNum<114){var el=document.getElementById('si'+(curSurahNum+1));if(el)el.click();}}
function seekTo(e,el){if(!auEl||!auEl.duration)return;var r=el.getBoundingClientRect();var pct=(e.clientX-r.left)/r.width;auEl.currentTime=pct*auEl.duration;}
function setVol(v){if(auEl)auEl.volume=parseFloat(v);}
function setSpd(s,el){auSpd=s;if(auEl)auEl.playbackRate=s;document.querySelectorAll('.spd').forEach(b=>b.classList.remove('on'));el.classList.add('on');}
function toggleRep(){auRepeat=!auRepeat;document.getElementById('repBtn').classList.toggle('on',auRepeat);}
function fmt(s){if(!s||isNaN(s))return'0:00';var h=Math.floor(s/3600),m=Math.floor((s%3600)/60),sc=Math.floor(s%60);return h>0?h+':'+pd(m)+':'+pd(sc):m+':'+pd(sc);}
function pd(n){return n<10?'0'+n:''+n;}
</script>

<?php require_once 'footer.php'; ?>

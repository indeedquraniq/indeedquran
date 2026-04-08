<?php
require_once 'data.php';
$slug = $_GET['slug'] ?? '';
$reciter = getReciterBySlug($slug, $reciters);
if(!$reciter){header('Location: /listen-quran/');exit;}
$page_title = htmlspecialchars($reciter['name']).' Full Quran MP3 — Listen & Download Free | Indeed Qur\'an';
$page_desc = 'Listen to '.htmlspecialchars($reciter['name']).' full Quran recitation online free. Download all 114 Surahs MP3. '.$reciter['type'].($reciter['mosque']?' — '.$reciter['mosque']:'').'. No ads. indeedquran.com';
$page_keywords = strtolower(str_replace(' ','-',$reciter['name'])).' quran mp3, listen '.strtolower($reciter['name']).' quran, download '.strtolower($reciter['name']).' mp3, '.strtolower($reciter['name']).' full quran';
$page_url = 'https://indeedquran.com/listen-quran/reciter/'.$slug.'/';
require_once 'header.php';
?>
<style>
.rc-hero{padding:48px 60px 36px;background:var(--card);border-bottom:1px solid var(--border);}
@media(max-width:700px){.rc-hero{padding:24px 18px;}}
.rc-hero-row{display:flex;align-items:flex-start;gap:24px;flex-wrap:wrap;}
.rc-hero-av{width:100px;height:100px;border-radius:50%;background:rgba(0,80,100,.3);border:3px solid var(--cyan);display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:700;color:var(--cyan);flex-shrink:0;}
.rc-hero-info{flex:1;}
.rc-hero-name{font-family:'Cinzel',serif;font-size:32px;font-weight:700;color:var(--text);margin-bottom:6px;}
.rc-hero-name-ar{font-family:'Scheherazade New',serif;font-size:22px;color:var(--cyan);margin-bottom:10px;direction:rtl;}
.rc-hero-tags{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:14px;}
.rc-tag{font-size:12px;padding:5px 14px;border-radius:20px;background:var(--cyan2);border:1px solid var(--cyan3);color:var(--cyan);}
.rc-hero-desc{font-size:15px;color:var(--muted);line-height:1.7;}
.rc-breadcrumb{font-size:12px;color:var(--dim);margin-bottom:16px;}
.rc-breadcrumb a{color:var(--cyan);text-decoration:none;}
.surah-wrap{padding:32px 60px;}
@media(max-width:700px){.surah-wrap{padding:20px 18px;}}
.sw-title{font-family:'Cinzel',serif;font-size:22px;color:var(--text);margin-bottom:6px;}
.sw-sub{font-size:14px;color:var(--muted);margin-bottom:24px;}
.surah-table{width:100%;border-collapse:collapse;}
.st-head{display:grid;grid-template-columns:50px 1fr 1.2fr 80px 80px;padding:10px 18px;background:var(--navy3);border-radius:10px;margin-bottom:8px;font-size:11px;color:var(--dim);letter-spacing:.06em;}
.s-row{display:grid;grid-template-columns:50px 1fr 1.2fr 80px 80px;padding:12px 18px;border-radius:10px;align-items:center;border:1px solid transparent;cursor:pointer;transition:.15s;margin-bottom:4px;background:var(--card);}
.s-row:hover{border-color:var(--cyan3);}
.s-row.playing{border-color:var(--cyan);background:var(--cyan2);}
.s-num{font-size:12px;color:var(--dim);}
.s-ar{font-family:'Scheherazade New',serif;font-size:20px;color:var(--text);}
.s-en{font-size:13px;color:var(--muted);}
.s-play-btn{width:34px;height:34px;border-radius:50%;background:var(--cyan2);border:1px solid var(--cyan3);display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--cyan);font-size:11px;transition:.2s;}
.s-row.playing .s-play-btn{background:var(--cyan);color:#0A0E1A;}
.s-dl-btn{width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,.04);border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;color:var(--dim);font-size:11px;text-decoration:none;transition:.2s;}
.s-dl-btn:hover{border-color:var(--cyan3);color:var(--cyan);}
.player-fixed{position:fixed;bottom:0;left:0;right:0;background:var(--card);border-top:2px solid var(--cyan);padding:12px 40px;z-index:50;}
@media(max-width:700px){.player-fixed{padding:12px 16px;}}
.pf-row1{display:flex;align-items:center;gap:12px;margin-bottom:8px;flex-wrap:wrap;}
.pf-av{width:40px;height:40px;border-radius:50%;background:rgba(0,80,100,.3);border:1.5px solid var(--cyan);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:var(--cyan);flex-shrink:0;}
.pf-info{flex:1;}
.pf-rc{font-size:13px;font-weight:600;color:var(--cyan);}
.pf-su{font-size:11px;color:var(--muted);margin-top:2px;}
.pf-ctrls{display:flex;align-items:center;gap:10px;}
.pf-btn{width:32px;height:32px;border-radius:50%;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:12px;color:var(--muted);background:none;}
.pf-play{width:44px;height:44px;border-radius:50%;background:var(--cyan2);border:1.5px solid var(--cyan);display:flex;align-items:center;justify-content:center;cursor:pointer;}
.pf-tri{width:0;height:0;border-style:solid;border-width:9px 0 9px 16px;border-color:transparent transparent transparent var(--cyan);margin-left:3px;}
.pf-pause{display:flex;gap:4px;}.pf-pb{width:4px;height:16px;background:var(--cyan);border-radius:2px;}
.prog-wrap{display:flex;align-items:center;gap:10px;margin-bottom:6px;}
.prog{flex:1;height:4px;background:rgba(0,200,232,.12);border-radius:2px;cursor:pointer;position:relative;}
.prog-fill{height:100%;background:var(--cyan);border-radius:2px;width:0%;}
.prog-dot{width:10px;height:10px;border-radius:50%;background:var(--cyan);position:absolute;top:50%;left:0%;transform:translate(-50%,-50%);}
.time{font-size:11px;color:var(--dim);min-width:32px;font-variant-numeric:tabular-nums;}
.extra-row{display:flex;align-items:center;gap:10px;flex-wrap:wrap;}
.vol-row{display:flex;align-items:center;gap:6px;flex:1;min-width:100px;}
.vol-sl{flex:1;accent-color:var(--cyan);}
.vol-ic{font-size:12px;color:var(--dim);}
.spd{font-size:10px;padding:3px 9px;border-radius:20px;border:1px solid var(--border);color:var(--muted);cursor:pointer;transition:.2s;}
.spd.on{border-color:var(--cyan3);color:var(--cyan);}
.rep-btn{font-size:10px;padding:3px 9px;border-radius:20px;border:1px solid var(--border);color:var(--muted);cursor:pointer;transition:.2s;}
.rep-btn.on{border-color:var(--cyan3);color:var(--cyan);}
body{padding-bottom:160px;}
</style>

<?php
$ini = strtoupper(substr($reciter['name'],0,1)).strtoupper(substr(explode(' ',$reciter['name'])[1]??'',0,1));
?>

<div class="rc-hero">
  <div class="rc-breadcrumb"><a href="/">Home</a> › <a href="/listen-quran/">Listen Quran</a> › <?= htmlspecialchars($reciter['name']) ?></div>
  <div class="rc-hero-row">
    <div class="rc-hero-av"><?= $ini ?></div>
    <div class="rc-hero-info">
      <h1 class="rc-hero-name"><?= htmlspecialchars($reciter['name']) ?></h1>
      <div class="rc-hero-name-ar"><?= $reciter['name_ar'] ?></div>
      <div class="rc-hero-tags">
        <span class="rc-tag"><?= $reciter['type'] ?></span>
        <span class="rc-tag"><?= $reciter['country'] ?></span>
        <?php if($reciter['mosque']): ?><span class="rc-tag"><?= htmlspecialchars($reciter['mosque']) ?></span><?php endif; ?>
        <span class="rc-tag">114 Surahs</span>
        <span class="rc-tag">High Quality MP3</span>
      </div>
      <p class="rc-hero-desc">Listen to the complete Holy Quran recited by <?= htmlspecialchars($reciter['name']) ?> (<?= $reciter['name_ar'] ?>). All 114 Surahs available to listen online and download as MP3 files for free. <?= $reciter['mosque'] ? 'Imam at '.$reciter['mosque'].'.' : '' ?> No registration required. No ads. Free forever on indeedquran.com.</p>
    </div>
  </div>
</div>

<div class="surah-wrap">
  <h2 class="sw-title">All 114 Surahs — <?= htmlspecialchars($reciter['name']) ?></h2>
  <p class="sw-sub">Click ▶ to listen • Click ⬇ to download MP3 • Auto-plays next Surah</p>
  <div class="st-head">
    <span>#</span><span>Arabic</span><span>English</span><span>Play</span><span>Download</span>
  </div>
  <?php foreach($surahs as $num => $s): ?>
  <div class="s-row" id="sr<?= $num ?>" onclick="playSurah(<?= $num ?>,'<?= addslashes($s['en']) ?>',this)">
    <div class="s-num"><?= $num ?></div>
    <div class="s-ar"><?= $s['ar'] ?></div>
    <div class="s-en"><?= $s['en'] ?><br><span style="font-size:10px;color:var(--dim)"><?= $s['ayahs'] ?> ayahs</span></div>
    <div class="s-play-btn" id="sp<?= $num ?>">▶</div>
    <a class="s-dl-btn" id="dl<?= $num ?>" href="<?= $reciter['server'].str_pad($num,3,'0',STR_PAD_LEFT) ?>.mp3" download="IndeedQuran-<?= $s['en'] ?>-<?= str_replace(' ','-',$reciter['name']) ?>.mp3" title="Download <?= $s['en'] ?> MP3" onclick="e=>e.stopPropagation()">⬇</a>
  </div>
  <?php endforeach; ?>
</div>

<!-- Fixed player -->
<div class="player-fixed">
  <div class="pf-row1">
    <div class="pf-av"><?= $ini ?></div>
    <div class="pf-info">
      <div class="pf-rc"><?= htmlspecialchars($reciter['name']) ?></div>
      <div class="pf-su" id="pfSu">Tap any Surah above to play ▶</div>
    </div>
    <div class="pf-ctrls">
      <button class="pf-btn" onclick="prevSurah()">⏮</button>
      <button class="pf-btn" onclick="seekBack()">⏪</button>
      <div class="pf-play" onclick="togglePlay()"><div id="playIcon"><div class="pf-tri"></div></div></div>
      <button class="pf-btn" onclick="seekFwd()">⏩</button>
      <button class="pf-btn" onclick="nextSurah()">⏭</button>
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

<script>
var auEl=null,auPlaying=false,auRepeat=false,auSpd=1;
var curSurahNum=0,curSurahName='';
var server='<?= $reciter['server'] ?>';

function playSurah(num,name,el){
  document.querySelectorAll('.s-row').forEach(s=>{s.classList.remove('playing');s.querySelector('.s-play-btn').textContent='▶';});
  el.classList.add('playing');el.querySelector('.s-play-btn').textContent='⏸';
  curSurahNum=num;curSurahName=name;
  document.getElementById('pfSu').textContent='Surah '+name+' • Loading...';
  if(auEl){auEl.pause();auEl=null;}resetProg();
  var n=String(num).padStart(3,'0');
  auEl=new Audio(server+n+'.mp3');
  auEl.playbackRate=auSpd;auEl.volume=parseFloat(document.getElementById('volSl').value);
  auEl.addEventListener('loadedmetadata',()=>document.getElementById('tDur').textContent=fmt(auEl.duration));
  auEl.addEventListener('timeupdate',()=>{
    if(!auEl.duration)return;
    var p=(auEl.currentTime/auEl.duration)*100;
    document.getElementById('progFill').style.width=p+'%';
    document.getElementById('progDot').style.left=p+'%';
    document.getElementById('tCur').textContent=fmt(auEl.currentTime);
  });
  auEl.addEventListener('playing',()=>{setPlay(true);document.getElementById('pfSu').textContent='Surah '+name+' • Playing';});
  auEl.addEventListener('pause',()=>setPlay(false));
  auEl.addEventListener('ended',()=>{setPlay(false);if(auRepeat){auEl.currentTime=0;auEl.play();}else{nextSurah();}});
  auEl.addEventListener('error',()=>{document.getElementById('pfSu').textContent='Could not load — check connection';setPlay(false);});
  auEl.play().catch(()=>{document.getElementById('pfSu').textContent='Surah '+name+' • Tap ▶ to play';setPlay(false);});
  el.scrollIntoView({behavior:'smooth',block:'nearest'});
}
function togglePlay(){if(!auEl){return;}if(auEl.paused)auEl.play().then(()=>setPlay(true));else{auEl.pause();setPlay(false);}}
function setPlay(p){auPlaying=p;document.getElementById('playIcon').innerHTML=p?'<div class="pf-pause"><div class="pf-pb"></div><div class="pf-pb"></div></div>':'<div class="pf-tri"></div>';}
function resetProg(){document.getElementById('progFill').style.width='0%';document.getElementById('progDot').style.left='0%';document.getElementById('tCur').textContent='0:00';document.getElementById('tDur').textContent='--:--';}
function seekBack(){if(auEl)auEl.currentTime=Math.max(0,auEl.currentTime-10);}
function seekFwd(){if(auEl&&auEl.duration)auEl.currentTime=Math.min(auEl.duration,auEl.currentTime+10);}
function prevSurah(){if(curSurahNum>1){var el=document.getElementById('sr'+(curSurahNum-1));if(el)el.click();}}
function nextSurah(){if(curSurahNum<114){var el=document.getElementById('sr'+(curSurahNum+1));if(el)el.click();}}
function seekTo(e,el){if(!auEl||!auEl.duration)return;var r=el.getBoundingClientRect();auEl.currentTime=((e.clientX-r.left)/r.width)*auEl.duration;}
function setVol(v){if(auEl)auEl.volume=parseFloat(v);}
function setSpd(s,el){auSpd=s;if(auEl)auEl.playbackRate=s;document.querySelectorAll('.spd').forEach(b=>b.classList.remove('on'));el.classList.add('on');}
function toggleRep(){auRepeat=!auRepeat;document.getElementById('repBtn').classList.toggle('on',auRepeat);}
function fmt(s){if(!s||isNaN(s))return'0:00';var h=Math.floor(s/3600),m=Math.floor((s%3600)/60),sc=Math.floor(s%60);return h>0?h+':'+pd(m)+':'+pd(sc):m+':'+pd(sc);}
function pd(n){return n<10?'0'+n:''+n;}
</script>

<?php require_once 'footer.php'; ?>

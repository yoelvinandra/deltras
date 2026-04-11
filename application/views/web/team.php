
<!-- HIGHLIGHT + NEXT MATCH -->
<section class="team-section">
  <div class="team-title">
    <div class="fira-sans-extrabold">TEAM</div>
  </div>
  <div class="tab">
      <div class="tab-header"> 
        <ul>
          <li>
            <a  class="fira-sans-regular active" href="#management-tab" data-tab="management-tab">MANAGEMENT</a>
          </li>
          <li>
            <a  class="fira-sans-regular" href="#senior-team-tab" data-tab="senior-team-tab" >SENIOR TEAM</a>
          </li>
          <li>
            <a  class="fira-sans-regular" href="#academy-tab" data-tab="academy-tab" >ACADEMY</a>
          </li>
        </ul>
      </div>
      <div class="tab-child"> 
        <div id="management-tab"  class="active">
            
        </div>
        <div id="senior-team-tab">
      
        </div>
        <div id="academy-tab">  

        </div>
    </div>
  </div>  
</section>

<script>
//FIXTURE
document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('.tab-header a');
  const panels = document.querySelectorAll('.tab-child > div');

  console.log("links:", links.length);
  console.log("panels:", panels.length);

  links.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();

      const target = link.dataset.tab;
      console.log("clicked:", target);
      
      const targetEl = document.getElementById(target);
      if (!targetEl) {
        console.log("target not found!");
        return;
      }
      
      links.forEach(l => l.classList.remove('active'));
      panels.forEach(p => p.classList.remove('active'));

      link.classList.add('active');
      targetEl.classList.add('active');
    });
  });

  $.ajax({
      url: '<?base_url()?>' + 'Master/Data/Player/web?for=PLAYER',
      type: 'GET',
      dataType: 'json',
      success: function (data) {

        var html; 
        var dataTab;
        
        //MANAGEMENT
        html = "";
        dataTab = [];
        dataTab =  data.rows.filter(row => row.TAB == 'MANAGEMENT')[0]?.DATA;
        for(var x = 0 ; x < dataTab.length;x++)
        {
          html += `
            <div class="player-title fira-sans-light">`+dataTab[x].HEADER+`</div>
            <div class="player-detail">`;

            var detailTab = dataTab[x].PLAYER;

            for(var y = 0 ; y < detailTab.length;y++)
            {
              html += `
                <div class="player-card">
                  <div class="card-photo">
                    <img src="`+detailTab[y].GAMBAR+`" alt="`+detailTab[y].NAMA+`"/>
                    <span class="card-number">`+detailTab[y].SQUADNUMBER+`</span>
                  </div>
                  <div class="card-info">
                    <div class="player-name fira-sans-black">`+detailTab[y].NAMA+`</div>
                    <div class="player-position fira-sans-regular">`+detailTab[y].POSITION+`</div>
                  </div>
                </div>   
            `;
          }

          html += `
            </div>    
          `;
          
        }
        $("#management-tab").html(html);
        //MANAGEMENT

        //SENIOR TEAM
        html = "";
        dataTab = [];
        dataTab = data.rows.filter(row => row.TAB == 'SENIOR TEAM')[0]?.DATA;
        for(var x = 0 ; x < dataTab.length;x++)
        {
          html += `
            <div class="player-title fira-sans-light">`+dataTab[x].HEADER+`</div>
            <div class="player-detail">`;

            var detailTab = dataTab[x].PLAYER;

            for(var y = 0 ; y < detailTab.length;y++)
            {
              html += `
                <div class="player-card">
                  <div class="card-photo">
                    <img src="`+detailTab[y].GAMBAR+`" alt="`+detailTab[y].NAMA+`"/>
                    <span class="card-number">`+detailTab[y].SQUADNUMBER+`</span>
                  </div>
                  <div class="card-info">
                    <div class="player-name fira-sans-black">`+detailTab[y].NAMA+`</div>
                    <div class="player-position fira-sans-regular">`+detailTab[y].POSITION+`</div>
                  </div>
                </div>   
            `;
          }

          html += `
            </div>    
          `;
          
        }
        $("#senior-team-tab").html(html);
        //SENIOR TEAM

        //ACADEMY
        html = "";
        dataTab = [];
        dataTab = data.rows.filter(row => row.TAB == 'ACADEMY')[0]?.DATA;
        for(var x = 0 ; x < dataTab.length;x++)
        {
          html += `
            <div class="player-title fira-sans-light">`+dataTab[x].HEADER+`</div>
            <div class="player-detail">`;

            var detailTab = dataTab[x].PLAYER;

            for(var y = 0 ; y < detailTab.length;y++)
            {
              html += `
                <div class="player-card">
                  <div class="card-photo">
                    <img src="`+detailTab[y].GAMBAR+`" alt="`+detailTab[y].NAMA+`"/>
                    <span class="card-number">`+detailTab[y].SQUADNUMBER+`</span>
                  </div>
                  <div class="card-info">
                    <div class="player-name fira-sans-black">`+detailTab[y].NAMA+`</div>
                    <div class="player-position fira-sans-regular">`+detailTab[y].POSITION+`</div>
                  </div>
                </div>   
            `;
          }

          html += `
            </div>    
          `;
          
        }
        $("#academy-tab").html(html);
        //ACADEMY
      }
  });

});
</script>
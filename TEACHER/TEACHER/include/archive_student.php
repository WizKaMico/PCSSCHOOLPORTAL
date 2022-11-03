
       <div class="col-md-12">


            <div class="card card-user">
            <div class="tab">
              <button class="tablinks" onclick="openCity(event, 'ARCHIVE')">ARCHIVE</button>
              <button class="tablinks" onclick="openCity(event, 'LOCKED')">LOCKED</button>
            </div>
                <div class="card-body">
                 <div class="tabcontent" id="ARCHIVE" style="display:none;">
                 <h5>ARCHIVE STUDENT</h5>   
                 <iframe src="STUDENT/archive.php" style="width:100%; height:600px; border:none;"></iframe>
                 </div>   
       
                 <div class="tabcontent" id="LOCKED" style="display:none;">
                  <h5>LOCKED STUDENT</h5>      
                  <iframe src="STUDENT/locked.php" style="width:100%; height:600px; border:none;"></iframe>
                 </div> 
            </div>
          </div>
 




<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

   <style type="text/css">
    
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
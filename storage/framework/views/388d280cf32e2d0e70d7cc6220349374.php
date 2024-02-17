
      <!-- <div class="loader-wrapper">
         <span class="loader"><span class="loader-inner"></span></span>
      </div> -->

      <!--============================ TOP MENU ================================================== -->
      <div class="Tools">
         <ul>
            <li>
               <i class='bx bxs-brightness-half'></i>
               <p>Brightness</p>
            </li>
            <li>
               <i class='bx bxs-color' ></i>
               <p>Blur</p>
            </li>
            <li>
               <i class='bx bxs-collection' ></i>
               <p>GreyScale</p>
            </li>
            <li>
               <i class='bx bxs-color-fill' ></i>
               <p>Hue</p>
            </li>
            <li>
               <i class='bx  bxs-landscape' ></i>
               <p>Saturation</p>
            </li>
            <li>
               <i class='bx bxs-magic-wand' ></i>
               <p>Contrast</p>
            </li>
            <li>
               <i class='bx  bxs-droplet-half' ></i>
               <p>Invert</p>
            </li>
            <li>
               <i class='bx bxs-eraser' ></i>
               <p>Opacity</p>
            </li>
            <li>
               <i class='bx bxs-leaf' ></i>
               <p>Sepia</p>
            </li>
            <li id="ignore" onclick="Download_btn()">
               <i class='bx bx-export' ></i>
               <p>Export</p>
            </li>
         </ul>
      </div>
      <!-- TOP MENU ================================================== -->

      <!-- LEFT SIDE MENU PHOTO TRANSFORMS ------------------------------------------------------------------------------>
      <div id="leftSidenav" class="sidenav2">

         <div class="row2">
            <div class="columnUpload" >
               <div class="bx bxs-file-blank uploadfilebtn" onclick="uploadfile()" ></div>
               <span class="caption2">File Open</span>
            </div>
         </div>
            
         <hr class="new2">

         <div class="row2">
            <div class="column4" >
               <div class="bx bx-merge toolbtn3" onclick="openScale()" ></div>
               <span class="caption2">Scale</span>
            </div>
         </div>
         
         <div class="row2">
            <div class="column3" >
               <div id="horizontal" class="bx bx-reflect-vertical toolbtn2"  ></div>
               <span class="caption2">Mirror</span>
            </div>
            <div class="column3" >
               <div id="vertical" class="bx bx-reflect-horizontal toolbtn2"  ></div>
               <span class="caption2">Mirror</span>
            </div>
            <div class="column3" >
               <div id="left" class="bx bx-rotate-left toolbtn2"  ></div>
               <span class="caption2">RL</span>
            </div>
            <div class="column3" >
               <div id="right" class="bx bx-rotate-right toolbtn2"  ></div>
               <span class="caption2">RR</span>
            </div>
         </div>


         <div class="row2">
            <div class="column2" >
               <div class="bx bx-undo toolbtn3" onclick="undoImage()" ></div>
               <span class="caption2">Undo</span>
            </div>
            <div class="column2" >
               <div class="bx bx-outline toolbtn3" onclick="toggleFullScreen()" ></div>
               <span class="caption2">Fullscreen</span>
            </div>
         </div>

         <div class="row3">
            <div class="column4">
               <div class="toolbtn4" ><span class="caption3"><div id="imgsizetext" class="bx bx-screenshot" > 512 x 512px</div></span></div>
            </div>
         </div>

         <div class="row" style="height: 110px;">
         </div>
         
      </div>
      <!-- LEFT SIDE MENU PHOTO TRANSFORMS------------------------------------------------------------------------------>    
      
      
      <!-- RIGHT SIDE MENU PHOTO FILTERS ------------------------------------------------------------------------------>
      <div id="rightSidenav" class="sidenav">
         <!-- close menu button -->
         <a href="javascript:void(0)" class="closebtn" onclick="closeNavRight()">&times;</a>

         <div class="rightsidetitletext">Photo Filters</div>
         <div class="rightsidetitletext2">Filters</div>
         
         <hr class="new1">
      
         <div class="row">
            <div class="column" >
                  <img class="Xpro2 filterbuttonbox" onclick="applyfilter(this)" src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">Xpro2</span>
            </div>
            <div class="column">
                  <img class="Willow filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
                  <span class="caption">Willow</span>
            </div>
         </div>

         <div class="row">
            <div class="column" >
               <img class="Walden filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
               <span class="caption">Walden</span>
            </div>
            <div class="column">
               <img class="Valencia filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
               <span class="caption">Valencia</span>
            </div>
         </div>

         <div class="row">
            <div class="column" >
                  <img class="Toaster filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">Toaster</span>
            </div>
            <div class="column">
                  <img class="Sutro filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
                  <span class="caption">Sutro</span>
            </div>
         </div>
            
         <div class="row">
            <div class="column" >
                  <img class="Sierra filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">Sierra</span>
            </div>
            <div class="column">
                  <img class="Rise filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
                  <span class="caption">Rise</span>
            </div>
         </div>

         <div class="row">
            <div class="column" >
                  <img class="Nashville filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">Nashville</span>
            </div>
            <div class="column">
                  <img class="Mayfair filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
                  <span class="caption">Mayfair</span>
            </div>
         </div>

         <div class="row">
            <div class="column" >
                  <img class="Lofi filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">Lofi</span>
            </div>
            <div class="column">
                  <img class="Kelvin filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
                  <span class="caption">Kelvin</span>
            </div>
         </div>

         <div class="row">
            <div class="column" >
                  <img class="Inkwell filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">Inkwell</span>
            </div>
            <div class="column">
                  <img class="Hudson filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
                  <span class="caption">Hudson</span>
            </div>
         </div>

         <div class="row">
            <div class="column" >
                  <img class="Hefe filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">Hefe</span>
            </div>
            <div class="column">
                  <img class="Earlybird filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
                  <span class="caption">Earlybird</span>
            </div>
         </div>

         <div class="row">
            <div class="column" >
                  <img class="Brannan filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">Brannan</span>
            </div>
            <div class="column">
                  <img class="Amaro filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'   >
                  <span class="caption">Amaro</span>
            </div>
         </div>

         <div class="row">
            <div class="column" >
                  <img class="f1977 filterbuttonbox" onclick="applyfilter(this)"  src='https://previews.customer.envatousercontent.com/files/432572943/AirLabPhotoEditor/PhotoEditor/assets/Images/default.jpg'  >
                  <span class="caption">f1977</span>
            </div>
         </div>
      
         <div class="row" style="height: 110px;">
      </div>

      </div>
      <!-- RIGHT SIDE MENU PHOTO FILTERS------------------------------------------------------------------------------>
   

      <!-- FLOATING RIGHT BUTTON TO OPEN RIGHT SIDEBAR -------------------------------------------------------------->
      <div id="floatbtnt" onclick="openNavRight()" class="bx bx-caret-left floatbtn"></div>

      
      <!-- FLOATING LEFT BUTTON TO OPEN LEFT SIDEBAR -------------------------------------------------------------->
      <div id="floatbtnt2" onclick="openNavLeft()" class="bx bx-caret-right floatbtnmain"></div>

      <!-- Main SLIDERS FOR IMAGE EDITOR ------------------------------------------------------------------------------>
      <div style="width: 85%; margin: auto;"> 
         <div class="main">
               <div class="content">
                  <p id="logo">ADJUSTMENTS</p>
                  <div class="choose_image">
                     <div class="upload_img_box">
                        <i class='bx bxs-image-add' ></i><br>
                        <input type="file" name="selectedImage" id="selectedImage" accept="image/jpeg, image/png">
                        <p id="hint">choose Image from folder</p>
                        <p id="hint2">choose Image</p>
                     </div>
                  </div>
                  <canvas id="image_canvas"></canvas>
                  <div class="image_holder">
                     <button id="remove_img_btn"><i class='bx bxs-message-square-x' ></i></button>
                     <img class="imgcenterscale" src="#" alt="img" id="image">
                  </div>
                  <div class="options">
                     <div class="option">
                        <input type="range" max="200" min="0" value="100" id="brightness" class="slider">
                        <p id="brightVal" class="show_value">100</p>
                     </div>
                     <div class="option">
                        <input type="range" max="40" min="0" value="0" id="blur" class="slider">
                        <p id="blurVal" class="show_value">0</p>
                     </div>
                     <div class="option">
                        <input type="range" max="100" min="0" value="0" id="greyScale" class="slider">
                        <p id="greyVal" class="show_value">0</p>
                     </div>
                     <div class="option">
                        <input type="range" max="360" min="0" value="0" id="hue" class="slider">
                        <p id="hueVal" class="show_value">0</p>
                     </div>
                     <div class="option">
                        <input type="range" max="100" min="1" value="1" id="saturation" class="slider">
                        <p id="saturationVal" class="show_value">1</p>
                     </div>
                     <div class="option">
                        <input type="range" max="600" min="1" value="100" id="contrast" class="slider">
                        <p id="contrastVal" class="show_value">100</p>
                     </div>
                     <div class="option">
                        <input type="range" max="100" min="0" value="0" step="100" id="invert" class="slider">
                        <p id="invertVal" class="show_value">0</p>
                     </div>
                     <div class="option">
                        <input type="range" max="100" min="0" value="100" id="opacity" class="slider">
                        <p id="opacityVal" class="show_value">100</p>
                     </div>
                     <div class="option">
                        <input type="range" max="100" min="0" value="0" id="sepia" class="slider">
                        <p id="sepiaVal" class="show_value">0</p>
                     </div>
                     <div class="option">
                        <input type="range" max="10" min="1" value="1" step="0.05" id="scalet" class="slider">
                        <p id="scaleVal" class="show_value">1x</p>
                     </div>
                     <div id="zoombar" class="option">
                        <div id="imgsizetext" class="bx  bx-zoom-in" style="font-size: 1.5em; padding-right: 10px; color: white;"></div>
                        <input type="range" style="width: 55%;" max="10" min="0.5" value="7.35" step="0.05" id="zoomin" class="slider">
                        <p id="zoomVal" class="show_value" style="transform: rotate(-90deg); text-align: center; width: 50px;">7.35x</p>
                     </div>
                  </div>
                  <button id="clearAll"><i class='bx bx-reset' ></i><span>Undo</span></button>
                  <button id="downloadImg" onclick="downloadcenterdiv()" ><span>Export</span><i class="bx bx-reset"></i></button>
               </div>
            </div>
      </div> 
      <!-- Main SLIDERS FOR IMAGE EDITOR ------------------------------------------------------------------------------>
      
      <!---Button bar  -->
      <div class="Tools" >
         <ul>
            <li onclick="removeBg()">
              <!---background icon-->
               <i class='bx bxs-user'></i> 
               <p>Remove BG</p>
            </li>
         </ul>
      </div>

      <div id="editor_loader" style="position: absolute; top: 0; display: none; justify-content: center; align-items: center; width: 100%; height: 100%">
         <img src="<?php echo e(asset('editor_assets/images/editor_loader.gif')); ?>" alt="loader">
      </div><?php /**PATH C:\Users\01026\OneDrive\Desktop\Abd_elrahman\anaonline\AnaLive\resources\views/photo_editor/editor.blade.php ENDPATH**/ ?>
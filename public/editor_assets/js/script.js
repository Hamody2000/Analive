/*========================  LOADER =================================*/
// Finish doing things after the pause//loading screen, fade out loader when page loads
$(window).on("load",function(){
    // wait 1 second
    setTimeout(continueExecution, 1000) // Wait 1 second before continuing
 });
 
 
 function continueExecution()
 {
    $(".loader-wrapper").fadeOut("slow");
 }
 /*========================  LOADER =================================*/
 
 // Grab all the elements in the index.html
 let upload_img_box = document.querySelector('.upload_img_box');
 let selectedImage = document.querySelector('#selectedImage');
 let choose_image = document.querySelector('.choose_image');
 
 let image_holder = document.querySelector('.image_holder');
 let image = document.querySelector('#image');
 
 // grab all the sliders that are used to adjust the photo filters
 let slider = document.querySelectorAll('.slider');
 let show_value = document.querySelectorAll('.show_value');
 
 // An array that holds all references of the filter effects in the top menu bar
 let list_options = document.querySelectorAll('.Tools ul li'); 
 
 // A Reference to all sliders that appear after pressing a button in the list on the array above
 let options = document.querySelector('.options');
 let option = document.querySelectorAll('.option');
 
 // Reference to zoombar slider
 let zoombar = document.querySelector('#zoombar');
 
 let clearAll = document.querySelector('#clearAll');
 let remove_img_btn = document.querySelector('#remove_img_btn');
 
 // Setup Canvas Element 
 let canvas = document.querySelector('#image_canvas');
 const context = canvas.getContext('2d');
 
 // Leftside menu image size text
 const imgsizetext = document.getElementById('imgsizetext'); 
 
 let File_Name;
 let Edited = false;
 
 
 /*======================================= Default Values ===========================*/
 let rectWidthTemp = 0, rectHeightTemp = 0, rectWidthTemp2 = 0, rectHeightTemp2 = 0;
 
 /* GRAB image filters */
 let f1977 = document.querySelector('.f1977');
 let Amaro = document.querySelector('.Amaro');
 let Brannan = document.querySelector('.Brannan');
 let Earlybird = document.querySelector('.Earlybird');
 let Hefe = document.querySelector('.Hefe');
 let Hudson = document.querySelector('.Hudson');
 let Inkwell = document.querySelector('.Inkwell');
 let Kelvin = document.querySelector('.Kelvin');
 let Lofi = document.querySelector('.Lofi');
 let Mayfair = document.querySelector('.Mayfair');
 let Nashville = document.querySelector('.Nashville');
 let Rise = document.querySelector('.Rise');
 let Sierra = document.querySelector('.Sierra');
 let Sutro = document.querySelector('.Sutro');
 let Toaster = document.querySelector('.Toaster');
 let Valencia = document.querySelector('.Valencia');
 let Walden = document.querySelector('.Walden');
 let Willow = document.querySelector('.Willow');
 let Xpro2 = document.querySelector('.Xpro2');
 
 /* ======================= SET DEFAULT VALUES FOR IMAGE FILTER =========== */
    let bright = document.querySelector('#brightness');
    let blur = document.querySelector('#blur');
    let grey = document.querySelector('#greyScale');
    let hue = document.querySelector('#hue');
    let saturation = document.querySelector('#saturation');
    let contrast = document.querySelector('#contrast');
    let invert = document.querySelector('#invert');
    let opacity = document.querySelector('#opacity');
    let sepia = document.querySelector('#sepia');
 
 
    let brightValShow = document.querySelector('#brightVal');
    let blurValShow = document.querySelector('#blurVal');
    let greyValShow = document.querySelector('#greyVal');
    let hueValShow = document.querySelector('#hueVal');
    let saturationValShow = document.querySelector('#saturationVal');
    let contrastValShow = document.querySelector('#contrastVal');
    let invertValShow = document.querySelector('#invertVal');
    let opacityValShow = document.querySelector('#opacityVal');
    let sepiaValShow = document.querySelector('#sepiaVal');
    let scaleValShow = document.querySelector('#scaleVal');
    let zoomValShow = document.querySelector('#zoomVal');
 
    let brightVal = bright.value;
    let greyVal = grey.value;
    let blurVal = blur.value;
    let hueVal = hue.value;
    let satuVal = saturation.value;
    let contraVal = contrast.value;
    let invertVal = invert.value;
    let opacityVal = opacity.value;
    let sepiaVal = sepia.value;
    let scaleVal = scalet.value;
    let zoomVal = zoomin.value;
 
    brightValShow.innerHTML = brightVal;
    blurValShow.innerHTML = blurVal;
    greyValShow.innerHTML = greyVal;
    hueValShow.innerHTML = hueVal;
    saturationValShow.innerHTML = satuVal;
    contrastValShow.innerHTML = contraVal;
    invertValShow.innerHTML = invertVal;
    opacityValShow.innerHTML = opacityVal;
    sepiaValShow.innerHTML = sepiaVal;
 
    image.style.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)' + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
    context.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)'  + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
 
    // Flag variables to opening and closing left and right menus
    var opencloseLeft = "true";
    var opencloseRight = "true";
 
    //OPEN OR CLOSE MENUS ON START depending on device 
    if (matchMedia('only screen and (min-width: 600px)').matches) {
       // if desktop, pc, or larger screen
       opencloseRight = "false";
       opencloseLeft = "false";
       openNavRight();
       openNavLeft();
    }
    else{
       // if smartphone
       opencloseRight = "true";
       opencloseLeft = "true";
       closeNavLeft();
       closeNavRight();
    }
 
 /*handle choose image event*/
 upload_img_box.addEventListener("click", function () {
     selectedImage.value = ''; //this is required to re-upload image files with same names multiple times
     selectedImage.click();
 });
 
 //Check if image source has been changed
 image.onload = function()
 {
    canvas.height = image.naturalHeight;
    canvas.width = image.naturalWidth;
    //imgsizetext.innerHTML=" " + image.naturalHeight.toString() + " x " + image.naturalWidth.toString() + "px";
    imgsizetext.innerHTML=" " + parseFloat(image.naturalHeight*heightval).toFixed(0).replace('-','') + " x " + parseFloat(image.naturalWidth*widthval).toFixed(0).replace('-','') + "px";
    console.log("height=" + canvas.height);
 }
 
 /*choose image event*/
 selectedImage.addEventListener("change", function () {
 
    const file = this.files[0];
 
    if (file) {
       const reader = new FileReader();
       File_Name = file.name;
 
       choose_image.style.display = "none";
       image_holder.style.display = "block";
 
       reader.addEventListener("load", function () {
          image.setAttribute("src", this.result); //set image to file uploaded
          f1977.setAttribute("src", this.result); //set image to file uploaded
          Amaro.setAttribute("src", this.result); //set image to file uploaded
          Brannan.setAttribute("src", this.result); //set image to file uploaded
          Earlybird.setAttribute("src", this.result); //set image to file uploaded
          Hefe.setAttribute("src", this.result); //set image to file uploaded
          Hudson.setAttribute("src", this.result); //set image to file uploaded
          Inkwell.setAttribute("src", this.result); //set image to file uploaded
          Kelvin.setAttribute("src", this.result); //set image to file uploaded
          Lofi.setAttribute("src", this.result); //set image to file uploaded
          Mayfair.setAttribute("src", this.result); //set image to file uploaded
          Nashville.setAttribute("src", this.result); //set image to file uploaded
          Rise.setAttribute("src", this.result); //set image to file uploaded
          Sierra.setAttribute("src", this.result); //set image to file uploaded
          Sutro.setAttribute("src", this.result); //set image to file uploaded
          Toaster.setAttribute("src", this.result); //set image to file uploaded
          Valencia.setAttribute("src", this.result); //set image to file uploaded
          Walden.setAttribute("src", this.result); //set image to file uploaded
          Willow.setAttribute("src", this.result); //set image to file uploaded
          Xpro2.setAttribute("src", this.result); //set image to file uploaded
 
          // check if image file is too large ( >= 750), this can be adjusted
          // console.log(this.result.toString()); //image in string format
          /*
             var imgsize = new Image();
             imgsize.src = this.result;
 
             imgsize.onload = function() {
                // access image size here 
                console.log(this.width);
                
                if(this.result.width >= 750){
                   //set image size to 750
                   this.result.width = 750;
                }
             };
          */
          
          undoImage();
 
          //set default rectangle clip size to image uploaded
          rectWidthTemp = image.naturalWidth;
          rectHeightTemp = image.naturalHeight;
 
          
 
       });
 
       reader.readAsDataURL(file);
       remove_img_btn.style.display = "block";
    }
 
    if (Edited == false) {
       Edited = true;
    }
 
 })
 
 
 /*function call when slider value change*/
 for (let i = 0; i <= slider.length - 1; i++) {
    slider[i].addEventListener('input', editImage);
 }
 
 function editImage() {
     bright = document.querySelector('#brightness');
     blur = document.querySelector('#blur');
     grey = document.querySelector('#greyScale');
     hue = document.querySelector('#hue');
     saturation = document.querySelector('#saturation');
     contrast = document.querySelector('#contrast');
     invert = document.querySelector('#invert');
     opacity = document.querySelector('#opacity');
     sepia = document.querySelector('#sepia');
 
 
     brightValShow = document.querySelector('#brightVal');
     blurValShow = document.querySelector('#blurVal');
     greyValShow = document.querySelector('#greyVal');
     hueValShow = document.querySelector('#hueVal');
     saturationValShow = document.querySelector('#saturationVal');
     contrastValShow = document.querySelector('#contrastVal');
     invertValShow = document.querySelector('#invertVal');
     opacityValShow = document.querySelector('#opacityVal');
     sepiaValShow = document.querySelector('#sepiaVal');
 
     brightVal = bright.value;
     greyVal = grey.value;
     blurVal = blur.value;
     hueVal = hue.value;
     satuVal = saturation.value;
     contraVal = contrast.value;
     invertVal = invert.value;
     opacityVal = opacity.value;
     sepiaVal = sepia.value;
 
    brightValShow.innerHTML = brightVal;
    blurValShow.innerHTML = blurVal;
    greyValShow.innerHTML = greyVal;
    hueValShow.innerHTML = hueVal;
    saturationValShow.innerHTML = satuVal;
    contrastValShow.innerHTML = contraVal;
    invertValShow.innerHTML = invertVal;
    opacityValShow.innerHTML = opacityVal;
    sepiaValShow.innerHTML = sepiaVal;
 
    image.style.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)' + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
    context.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)'  + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
 
    //clearAll.style.transform = 'translateY(0px)';
 }
 
 
 /*handle each option click event*/
 list_options.forEach((list_option, index) => {
    list_option.addEventListener('click', function () {
      console.log(index);
 
       //check if list option is already active
       if(this.classList.contains("active_option")){
          // toggle filter off
          var num_options = 9; //number of image filter options in top bar
          num_options = num_options; //subtract by 1 because indexing starts at 0, we put export at end of list so its ignored
             
          for (let i = 0; i <= num_options; i++) {
                list_options[i].classList.remove("active_option");
                option[i].classList.remove("active_option");
                option[i].classList.remove("active_controller");
                options.style.transform = 'translateY(80px)'; // close options menu at the bottom
          }
          // zoom in bar removed
          option[10].classList.remove("active_option");
          option[10].classList.remove("active_controller");
 
          
       }
 
       else {
          var num_options = 9; //number of image filter options in top bar
          num_options = num_options; //subtract by 1 because indexing starts at 0, we put export at end of list so its ignored
 
          if (image.getAttribute('src') == "") {
             alert("Choose Image First");
          } else {
 
 
             if (Edited == true) {
                canvas.height = image.naturalHeight*heightval;
                canvas.width = image.naturalWidth*widthval;
                //imgsizetext.innerHTML=" " + image.naturalHeight*heightval + " x " + image.naturalWidth*widthval + "px";
                imgsizetext.innerHTML=" " + parseFloat(image.naturalHeight*heightval).toFixed(0).replace('-','') + " x " + parseFloat(image.naturalWidth*widthval).toFixed(0).replace('-','') + "px";
 
                for (let i = 0; i <= num_options; i++) {
 
                   if (index != i) {
                      list_options[i].classList.remove("active_option");
                      option[i].classList.remove("active_option");
                      option[i].classList.remove("active_controller");
 
                   } else {
                      if(this.id != "ignore"){
                         this.classList.add("active_option");
                         option[i].classList.add("active_controller");
                         // open slider
                         options.style.transform = 'translateY(0px)';
                      }
                   }
                }
                // zoom in bar removed
                option[10].classList.remove("active_option");
                option[10].classList.remove("active_controller");
 
 
             } else {
                alert("Import Your Image First");
             }
 
        }
 
    }
 
    })
 })
 
 
 /*============================= EXPORT/DOWNLOAD IMAGE BUTTON TO JPEG RESULT ==================================*/
 function Download_btn() {
   try{
      if (image.getAttribute('src') != "") {
 
         if (Edited == true) {
   
            context.translate(canvas.width / 2, canvas.height / 2);
            if(rotate !== 0) {
               context.rotate(rotate * Math.PI / 180);
            }
            context.scale(flipHorizontal, flipVertical);
            
            //divide canvas width and height by 2 to center image in middle after drawing it
            context.drawImage(image, -canvas.width / 2, -canvas.height / 2, canvas.width, canvas.height);
   
            // THE END RESULT, can be transferred to another site page, but in this case just simply download it
            var jpegUrl = canvas.toDataURL("image/jpg"); 
   
            const link = document.createElement("a");
            document.body.appendChild(link);
   
            link.setAttribute("href", jpegUrl);
            link.setAttribute("download", File_Name);
            link.click();
            document.body.removeChild(link);
            
   
         }
      }
   }catch(err){
      const link = document.getElementById("downloadLink")
      link.href = image.src;
      link.download = File_Name;
      
   }
    
    
    // close slider
    options.style.transform = 'translateY(80px)';

    
 }
 
 /*================= DOWNLOAD BUTTON ON CENTER WINDOW ================================*/
 function downloadcenterdiv(){
    list_options[9].click();
 }
 
 
 /*================= CLEAR OR RESET RANGE VALUES ================================*/
 clearAll.addEventListener("click", function () {
    undoImage();
 })
 
 function clearAllRangeValue() {
    image.style.filter = 'none';
    context.filter = 'none';
 
    for (let i = 0; i <= slider.length - 1; i++) {
       if (i == 0) {
          slider[i].value = '100'; //brightness
       }
       if (i == 1) {
          slider[i].value = '0'; //blur
       } 
       if (i == 2) {
          slider[i].value = '0'; //greyscale
       } 
       if (i == 3) {
          slider[i].value = '0'; //hue
       } 
       if (i == 4) {
          slider[i].value = '1'; //saturation
       } 
       if (i == 5) {
          slider[i].value = '100'; //contrast
       } 
       if (i == 6) {
          slider[i].value = '0'; //invert
       } 
       if (i == 7) {
          slider[i].value = '100'; //opacity
       } 
       if (i == 8) {
          slider[i].value = '0'; //sepia
       } 
    }
 
    editImage();
    //clearAll.style.transform = 'translateY(150px)';
 
    // CLEAR ALL SLIDERS
    var num_options = 9; //number of image filter options in top bar
    num_options = num_options; //subtract by 1 because indexing starts at 0, we put export at end of list so its ignored
 
    for (let i = 0; i <= num_options; i++) {
          list_options[i].classList.remove("active_option");
          option[i].classList.remove("active_option");
          option[i].classList.remove("active_controller");
    }
    // zoom in bar removed
    option[10].classList.remove("active_option");
    option[10].classList.remove("active_controller");
 
 
 }
 
 /*=============== REMOVE IMAGE ON BUTTON CLICK =====================================*/
 remove_img_btn.addEventListener("click", function () {
    image.src = "";
    this.style.display = "none";
    choose_image.style.display = "block";
    image_holder.style.display = "none";
    // close slider
    options.style.transform = 'translateY(80px)';
    undoImage();
    // reset side menu images to default when image is removed
    var defaultimg = "assets/Images/default.jpg";
    f1977.setAttribute("src", defaultimg); //set image to file uploaded
    Amaro.setAttribute("src", defaultimg); //set image to file uploaded
    Brannan.setAttribute("src", defaultimg); //set image to file uploaded
    Earlybird.setAttribute("src", defaultimg); //set image to file uploaded
    Hefe.setAttribute("src", defaultimg); //set image to file uploaded
    Hudson.setAttribute("src", defaultimg); //set image to file uploaded
    Inkwell.setAttribute("src", defaultimg); //set image to file uploaded
    Kelvin.setAttribute("src", defaultimg); //set image to file uploaded
    Lofi.setAttribute("src", defaultimg); //set image to file uploaded
    Mayfair.setAttribute("src", defaultimg); //set image to file uploaded
    Nashville.setAttribute("src", defaultimg); //set image to file uploaded
    Rise.setAttribute("src", defaultimg); //set image to file uploaded
    Sierra.setAttribute("src", defaultimg); //set image to file uploaded
    Sutro.setAttribute("src", defaultimg); //set image to file uploaded
    Toaster.setAttribute("src", defaultimg); //set image to file uploaded
    Valencia.setAttribute("src", defaultimg); //set image to file uploaded
    Walden.setAttribute("src", defaultimg); //set image to file uploaded
    Willow.setAttribute("src", defaultimg); //set image to file uploaded
    Xpro2.setAttribute("src", defaultimg); //set image to file uploaded
 })
 
 
 // ========================= Right Side Menu =========================
 function openNavRight() {
    if(opencloseRight === "true"){
       closeNavRight();
    }
    else{
       //document.getElementById("rightSidenav").style.width = "250px";
       //document.getElementById("floatbtnt").style.right = "250px";
       document.getElementById("rightSidenav").classList.add("sidenavWidth");
       document.getElementById("floatbtnt").classList.add("sidenavRight");
       document.getElementById("floatbtnt").style.boxShadow = "0px 0px 0px 0px rgb(0 0 0 / 0%)";
       document.getElementById("floatbtnt").style.background = "var(--right-floatingbuton-open-background-color, red)";
       opencloseRight = "true";
    }
  }
  
  function closeNavRight() {
    //document.getElementById("rightSidenav").style.width = "0";
    //document.getElementById("floatbtnt").style.right = "0";
    document.getElementById("rightSidenav").classList.remove("sidenavWidth");
    document.getElementById("floatbtnt").classList.remove("sidenavRight");
    document.getElementById("floatbtnt").style.boxShadow = "0.1px 4px 8px 5px rgb(0 0 0 / 20%)";
    document.getElementById("floatbtnt").style.background = "var(--right-floatingbuton-closed-background-color, red)";
    opencloseRight = "false";
  }
 
  // ========================= Left Side Menu =========================
 function openNavLeft() {
    if(opencloseLeft === "true"){
       closeNavLeft();
    }
    else{
       //document.getElementById("leftSidenav").style.width = "250px";
       //document.getElementById("floatbtnt2").style.left = "250px";
       document.getElementById("leftSidenav").classList.add("sidenavWidth2");
       document.getElementById("floatbtnt2").classList.add("sidenavLeft");
       document.getElementById("leftSidenav").style.paddingLeft="5px";
       document.getElementById("leftSidenav").style.paddingRight="5px";
       document.getElementById("floatbtnt2").style.boxShadow = "0px 0px 0px 0px rgb(0 0 0 / 0%)";
       document.getElementById("floatbtnt2").style.background = "var(--left-floatingbuton-open-background-color, red)";
       opencloseLeft = "true";
    }
  }
  
  function closeNavLeft() {
    //document.getElementById("leftSidenav").style.width = "0";
    //document.getElementById("floatbtnt2").style.left = "0";
    document.getElementById("leftSidenav").classList.remove("sidenavWidth2");
    document.getElementById("floatbtnt2").classList.remove("sidenavLeft");
    document.getElementById("leftSidenav").style.paddingLeft="0";
    document.getElementById("leftSidenav").style.paddingRight="0";
    document.getElementById("floatbtnt2").style.boxShadow = "0.1px 4px 8px 5px rgb(0 0 0 / 20%)";
    document.getElementById("floatbtnt2").style.background = "var(--left-floatingbuton-closed-background-color, red)";
    opencloseLeft = "false";
  }
 
  /* ================= APPLY FILTERS ============================ */
  function applyfilter(item) {
    
    //set to default values first
    brightVal = 100;
    greyVal = 0;
    blurVal = 0;
    hueVal = 0;
    satuVal = 1;
    contraVal = 100;
    invertVal = 0;
    opacityVal = 100;
    sepiaVal = 0;
 
    slider[0].value = '100'; //brightness
    slider[1].value = '0'; //blur
    slider[2].value = '0'; //greyscale
    slider[3].value = '0'; //hue
    slider[4].value = '1'; //saturation
    slider[5].value = '100'; //contrast
    slider[6].value = '0'; //invert
    slider[7].value = '100'; //opacity
    slider[8].value = '0'; //sepia
 
    // close the sliders
    options.style.transform = 'translateY(80px)';
 
    // initializing the filter value
    // grab filter effect values
    var allEffects = window.getComputedStyle(item).filter.split(" ");
    console.log("filter = " + allEffects);
 
    for(var i = 0; i < allEffects.length; i++){
       //console.log("filter = " + allEffects[i]); // filter = sepia(0.35),contrast(0.9),brightness(1.1),hue-rotate(-179deg),saturate(1.5)
       var filterSplit =  allEffects[i].split("("); // filter effect split => alleffects[0] = sepia , alleffects[1] = (value)
       var filterName = filterSplit[0];
       //console.log("filterName = " + filterName[0]);
       //console.log("Value = " + filterName[1]);
       var filterValue = filterSplit[1].replace(')',''); // value) => remove ending brackets
       //console.log("filterValue = " + filterValue);
 
       if(filterName === "sepia"){
          sepiaVal = filterValue;
          slider[8].value = sepiaVal; //sepia
       }
       else if(filterName === "brightness"){
          brightVal = parseInt(filterValue*100);
          slider[0].value = brightVal; //brightness
       }
       else if(filterName === "grayscale"){
          greyVal = parseInt(filterValue*100);
          slider[2].value = greyVal; //grayscale
       }
       else if(filterName === "blur"){
          blurVal = filterValue;
          slider[1].value = blurVal; //blur
       }
       else if(filterName === "hue-rotate"){
          var tempnum = parseInt(filterValue.replace('deg',''));
          if (tempnum < 0){
             tempnum += 360;
          }
          hueVal = tempnum.toString();
          slider[3].value = hueVal; //hue
       }
       else if(filterName === "saturate"){
          satuVal = filterValue;
          slider[4].value = satuVal; //saturation
       }
       else if(filterName === "contrast"){
          contraVal = parseInt(filterValue*100);
          slider[5].value = contraVal; //contrast
       }
       else if(filterName === "invert"){
          invertVal = filterValue;
          slider[6].value = invertVal; //invert
       }
       else if(filterName === "opacity"){
          opacityVal = filterValue;
          slider[7].value = opacityVal; //opacity
       }
    }
 
    
    // assign values to filter effects
    brightValShow.innerHTML = brightVal;
    blurValShow.innerHTML = blurVal;
    greyValShow.innerHTML = greyVal;
    hueValShow.innerHTML = hueVal;
    saturationValShow.innerHTML = satuVal;
    contrastValShow.innerHTML = contraVal;
    invertValShow.innerHTML = invertVal;
    opacityValShow.innerHTML = opacityVal;
    sepiaValShow.innerHTML = sepiaVal;
    
    image.style.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)' + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
    context.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)'  + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
    
    // toggle filter off
    var num_options = 9; //number of image filter options in top bar
    num_options = num_options; //subtract by 1 because indexing starts at 0, we put export at end of list so its ignored
       
    for (let i = 0; i <= num_options; i++) {
          list_options[i].classList.remove("active_option");
          option[i].classList.remove("active_option");
          option[i].classList.remove("active_controller");
    }
    // zoom in bar removed
    option[10].classList.remove("active_option");
    option[10].classList.remove("active_controller");
 
    
 
 }
 
 /*=============================== ROTATE & FLIP IMAGE ===============================*/
 let rotate = 0, flipHorizontal = 1, flipVertical = 1;
 rotateOptions = document.querySelectorAll(".row2 div"); //grab all the buttons for image transforms
 
 
 rotateOptions.forEach(optionrot => {
    optionrot.addEventListener("click", () => {
       //check if image is uploaded first
       if (image.getAttribute('src') == "") {
          //alert("Choose Image First");
          //if no image is detected then do no transformations
       } 
       else{
        if(optionrot.id === "left") {
            rotate -= 90;
        } else if(optionrot.id === "right") {
            rotate += 90;
        } else if(optionrot.id === "horizontal") {
          flipHorizontal = flipHorizontal === 1 ? -1 : 1;
       } else if(optionrot.id === "vertical") {
            flipVertical = flipVertical === 1 ? -1 : 1;
        }
          applyTransform();
          //This resets the canvas, so filters have to be reapplied to image after resizing
          image.style.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)' + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
          context.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)'  + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)'; 
       }
    });
 });
 
 
 const applyTransform = () => {
    image.style.transform = 'translateX(-50%) rotate(' + rotate + 'deg) scale(' + flipHorizontal +', '+ flipVertical + ')';
    context.transform = 'translateX(-50%) rotate(' + rotate + 'deg) scale(' + flipHorizontal +', '+ flipVertical + ')';
 }
 
 /*======================================= UNDO IMAGE ===========================*/
 function undoImage(){
    rotate = 0, flipHorizontal = 1, flipVertical = 1, widthval = 1, heightval = 1, rectWidthTemp = 0, rectHeightTemp = 0, rectWidthTemp2 = 0, rectHeightTemp2 = 0;
    clearAllRangeValue()
    applyTransform();
    clearTransforms();
 }
 
 
 
 /*======================================= SCALE IMAGE ===========================*/
 let widthval = 1, heightval = 1;
 const scaleslider = document.getElementById('scalet');
 scaleslider.addEventListener('input', handleChange);
 
 // SCALE image
 function handleChange(e) {
    
       const {value, max} = e.target;
       image.style.width = `${value*max}%`;
       image.style.height = `${value*max}%`;
       context.width = `${value*max}%`;
       context.height = `${value*max}%`;
       heightval = (image.style.height.replace('%','')/10);
       widthval = (image.style.width.replace('%','')/10);
       
       //This resets the canvas, so filters have to be reapplied to image after resizing
       canvas.height = image.naturalHeight*heightval;
       canvas.width = image.naturalWidth*widthval; 
       image.style.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)' + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
       context.filter = 'grayscale(' + greyVal + '%) hue-rotate(' + hueVal + 'deg) brightness(' + brightVal + '%) blur(' + blurVal + 'px) saturate(' + satuVal + ') contrast(' + contraVal + '%)'  + ' invert(' + invertVal + '%)' + ' opacity(' + opacityVal + '%)' + ' sepia(' + sepiaVal + '%)';
       
 
       //imgsizetext.innerHTML=" " + parseFloat(image.naturalHeight*heightval).toFixed(0) + " x " + parseFloat(image.naturalWidth*widthval).toFixed(0) + "px";
       imgsizetext.innerHTML=" " + parseFloat(image.naturalHeight*heightval).toFixed(0).replace('-','') + " x " + parseFloat(image.naturalWidth*widthval).toFixed(0).replace('-','') + "px";
 
       //update text
       scaleVal = `${value}x`;
       scaleValShow.innerHTML = scaleVal;
          
       
       //resize image to actual values instead of percentage
       image.style.width = `${(value*max)*10}%`;
       image.style.height = `${(value*max)*10}%`;
 }
 
 // OPEN SCALE MENU AND ZOOM MENU
 function openScale(){
    //check if image is uploaded
    if (image.getAttribute('src') == "") {
       alert("Choose Image First");
    } 
    else{
       //check if list option is already active
       if(option[9].classList.contains("active_option")){
          // toggle filter off
          var num_options = 9; //number of image filter options in top bar
          num_options = num_options; //subtract by 1 because indexing starts at 0, we put export at end of list so its ignored
             
          for (let i = 0; i <= num_options; i++) {
                list_options[i].classList.remove("active_option");
                option[i].classList.remove("active_option");
                option[i].classList.remove("active_controller");
                options.style.transform = 'translateY(80px)'; // close options menu at the bottom
          }
          // zoom in bar removed
          option[10].classList.remove("active_option");
          option[10].classList.remove("active_controller");
 
          
          
       }
       else{
 
          //activate scaling menu
          option[9].classList.add("active_option");
          option[9].classList.add("active_controller");
          // open slider
          options.style.transform = 'translateY(0px)';
 
          
          // toggle filter off
          var num_options = 9; //number of image filter options in top bar
          num_options = num_options-1; //subtract by 1 because indexing starts at 0, we put export at end of list so its ignored
             
          for (let i = 0; i <= num_options; i++) {
                list_options[i].classList.remove("active_option");
                option[i].classList.remove("active_option");
                option[i].classList.remove("active_controller");
          }
 
          
 
          //After opening scale menu open the zoom in and out menu also for scaling image
          openZoom();
       }
    }
 }
 
 
 /*======================================= ZOOM IN IMAGE ===========================*/
 // ZOOM IN IMAGE
 const zoomslider = document.getElementById('zoomin');
 zoomslider.addEventListener('input', handleChange2);
 
 function handleChange2(e) {
    const {value, max} = e.target;
    image_holder.style.height = `${value*max}%`;
    //heightval = parseInt(image.style.height.replace('%','')/100) * flipVertical;//HERE
    
    //update text
    zoomVal = `${value}x`;
    zoomValShow.innerHTML = zoomVal;
  }
 
 function openZoom(){
    // option[10] is the zoom bar
    option[10].classList.add("active_option");
    option[10].classList.add("active_controller");
 
 }
 
 
 
 
 
 /*======================================= CLEAR IMAGE TRANFORMS TO DEFAULT ===========================*/
 function clearTransforms() {
    // Set to default scale values
    image.style.width = '100%';
    image.style.height = '100%';
    context.width = '100%';
    context.height = '100%';
    widthval = 1; 
    heightval = 1;
 
    canvas.height = image.naturalHeight*heightval;
    canvas.width = image.naturalWidth*widthval;
    //imgsizetext.innerHTML=" " + parseFloat(image.naturalHeight*heightval).toFixed(0) + " x " + parseFloat(image.naturalWidth*widthval).toFixed(0) + "px";
    imgsizetext.innerHTML=" " + parseFloat(image.naturalHeight*heightval).toFixed(0).replace('-','') + " x " + parseFloat(image.naturalWidth*widthval).toFixed(0).replace('-','') + "px";
 
    //update text
    scaleVal = 1;
    slider[9].value = scaleVal; //zoom slider value
    scaleValShow.innerHTML = scaleVal+"x";
    
    // Set to default zoom values
    zoomVal = 7.35;
    zoomValShow.innerHTML = zoomVal+"x";
    slider[10].value = zoomVal; //zoom slider value
    image_holder.style.height = (zoomVal*10)+"%";
 
 
    rectWidthTemp = `${((0))}`;
    rectWidthTemp = image.naturalWidth - rectWidthTemp;
    rectHeightTemp = `${((0))}`;
    rectHeightTemp = image.naturalHeight - rectHeightTemp;
    rectWidthTemp2 = 0;
    rectHeightTemp2 = 0;
    
 }
 
 /*======================================= TOGGLE FULL SCREEN ===========================*/
 function cancelFullScreen() {
    var el = document;
    var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen||el.webkitExitFullscreen;
    if (requestMethod) { // cancel full screen.
        requestMethod.call(el);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
 }
 
 function requestFullScreen(el) {
    // Supports most browsers and their versions.
    var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;
 
    if (requestMethod) { // Native full screen.
        requestMethod.call(el);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
    return false
 }
 
 function toggleFullScreen(el) {
    if (!el) {
        el = document.documentElement; // Make the body go full screen.
    }
    var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) ||  (document.mozFullScreen || document.webkitIsFullScreen);
 
    if (isInFullScreen) {
        cancelFullScreen();
    } else {
        requestFullScreen(el);
    }
    return false;
 }
 
 /*======================================= Menu upload file button ===========================*/
 function uploadfile(){
    selectedImage.click();
 }


 //*======================================= Remove BG ===========================*/
 function removeBg(){
   let loader = document.getElementById('editor_loader');
   // i want to send ajax request to url http://127.0.0.1:8000/anaonline_service/remove_bg/ with post method and formdata include image
   var formData = new FormData();
   // Function to convert data URI to Blob
   function dataURItoBlob(dataURI) {
   var byteString = atob(dataURI.split(',')[1]);
   var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
   var ab = new ArrayBuffer(byteString.length);
   var ia = new Uint8Array(ab);
   for (var i = 0; i < byteString.length; i++) {
      ia[i] = byteString.charCodeAt(i);
   }
   return new Blob([ab], { type: mimeString });
   }

var blob = dataURItoBlob(image.src);

formData.append('image', blob);

loader.style.display='flex';
$.ajax({
  url: 'http://127.0.0.1:9000/anaonline_service/remove_bg/',
  type: 'POST',
  data: formData,
  processData: false,
  contentType: false,
  success: function (data) {
   loader.style.display='none';
   image.src=data.image_url;
  },
  error: function (error) {
   loader.style.display='none';
   console.log(data)
  }
});
 }
 
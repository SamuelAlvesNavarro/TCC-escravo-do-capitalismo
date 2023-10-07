let current = -1;
        let listActives = [];
        let inplace = ["<h1>", "</h1>", "<h2>", "</h2>"];
        let replace = ["*1", "/*1", "*2", "/*2"];

        var body = document.querySelector('body');
        var hmax = body.offsetHeight;

        var imgsToShow = document.getElementsByClassName('imgsToShow');
        var refsToShow = document.getElementsByClassName('ref-input-input');

        var thrownImg = document.getElementsByClassName('containerImg');

        var opps = document.getElementsByClassName('option');
        var opps_text_input = document.getElementsByClassName('input-op-text');
        var opps_text = document.getElementsByClassName('opps_text')
        var question_itself_input = document.getElementsByClassName('input-question-text');
        var question_itself_p = document.getElementById("question_text");

        

        function getRndInteger(min, max) {
            return Math.floor(Math.random() * (max - min) ) + min;
        }

        var all = document.getElementById('all');

        all.style.backgroundPosition = getRndInteger(0, 100) + '%'+ getRndInteger(0, 100) + '%';
        
        for(var z = 0; z < imgsToShow.length; z++){
            if(imgsToShow[z].src == ''){
                imgsToShow[z].style.display = 'none'
            }
            else{
                imgsToShow[z].style.display = 'block'
                console.log(imgsToShow[z].src)
            }
        }

        function replaceT(text, repl, inpl){
            return text.replace(repl, inpl);
        }

        function toggleEditAll(){

            /* TITLE */

            var titleh2 = document.getElementById('title-all');
            var titleInput = document.getElementById('title-input');

            titleh2.innerHTML = titleInput.value;

            /* TEXTAREA */
            var pre = document.getElementById('pre-history');

            var texta = document.getElementById('textarea-history');

            let texto = texta.value;

            for(var i = 0; i < inplace.length; i++){
                texto = replaceT(texto, replace[i], inplace[i]);
            }

            pre.innerHTML = texto;

            /* REFS */

            var refShowDiv = document.getElementById('appear-refs');

            refShowDiv.innerHTML = '';
            var u = 0;
            for(var i = 0; i < refsToShow.length; i++){
                if(refsToShow[i].value != ''){
                    if(u == 0) refShowDiv.innerHTML += (" - <a href="+refsToShow[i].value+">"+refsToShow[i].value+"</a>");
                    else refShowDiv.innerHTML += ("<br> - <a href="+refsToShow[i].value+">"+refsToShow[i].value+"</a>");
                    u++;
                }
            }

            /* QUESTIONS */

            for(var i = 0; i < 4; i++){
                opps_text[i].innerHTML = opps_text_input[i].value
            }
            question_itself_p.innerHTML = question_itself_input[0].value

            /* THROWN IMGS */

            for(var i = 0; i < 10; i++){
                thrownImg[i].classList.add("hide");
            }
            for(var u = 0; u < listActives.length; u++){
                thrownImg[listActives[u]].classList.remove("hide");
            }
        }



        /* EDIT MODE */

        var toggleEdit = document.getElementById("edit-bt");
        var editIcon = document.getElementById("edit-icon");
        var main = document.getElementById("main");
        var containerImgs = document.getElementById("containerImgs");
        var refs = document.getElementById("refs"); 
        var quest = document.getElementById("quest");

    toggleEdit.addEventListener('click', switchedit)

    var edit = false;
    function switchedit(){

        if(edit){
            editIcon.classList.remove('fa-eye');
            editIcon.classList.add('fa-pencil');
            main.classList.remove('edit');
            containerImgs.classList.remove('edit');
            refs.classList.remove('edit');
            quest.classList.remove('edit');
            edit = false;
            toggleEditAll();
            spread();

        }else{
            edit = true;
            editIcon.classList.remove('fa-pencil');
            editIcon.classList.add('fa-eye');
            main.classList.add('edit');
            containerImgs.classList.add('edit');
            refs.classList.add('edit');
            quest.classList.add('edit');
            for(var i = 0; i < 10; i++){
                thrownImg[i].classList.remove("hide");
            }
        }
    }
        /* DARK MODE */

    var toggle = document.getElementById("mode-icon");

    toggle.addEventListener('click', switchmode)

    const root = document.querySelector(":root");
    var dark = false;
    function switchmode(){
        root.classList.toggle('dark');

        if(dark){
            toggle.classList.remove('fa-moon');
            toggle.classList.add('fa-sun');
            dark = false;
            setTheme("light");
        }else{
            dark = true;
            setTheme("dark");
            toggle.classList.remove('fa-sun');
            toggle.classList.add('fa-moon');
        }
    }
    function setTheme(theme){
        localStorage.setItem("Theme", JSON.stringify(theme));
    }
    function getTheme(){
        let theme = JSON.parse(localStorage.getItem("Theme"));

        if(theme == "dark"){
            switchmode();
        }
    }

    /* IMG SPREAD */

    var img_spread = document.getElementsByClassName('containerImg');

    function spread(){
        for(var i = 0; i < img_spread.length; i++){
            if(i < img_spread.length / 2){
                img_spread[i].classList.add("to-left");
            }
            else{
                img_spread[i].classList.add("to-right");
            }
            img_spread[i].style.top = getRndInteger(0, (hmax-200))+"px";
            img_spread[i].style.transform = "rotate("+getRndInteger(-25, 120)+"deg)";
        }
    }

    /* IMG FILES */

    var imgs = document.getElementsByClassName('img-input');

    function inputimgchangeval(num){
        if(num > 0){
            inputLchange = eval("inputimgLabel"+num);
            inputIchange = eval("inputimg"+num);
            inputLchange.innerHTML = inputIchange.files[0].name;

            var inputimg = document.getElementsByClassName("input-file");
            
            
                const [file] = inputimg[num-1].files
                if (file) {
                    imgs[num-1].src = URL.createObjectURL(file)
                    imgsToShow[num-1].src = URL.createObjectURL(file)
                    imgs[num-1].classList.remove('empty-img-input')
                    generateList();
                }
        }
        if(num < 0){
            num *= -1;
            inputLchange = eval("inputimgLabel"+num);
            inputIchange = eval("inputimg"+num);
            inputLchange.innerHTML = "Imagem " + num;
            inputIchange.value = null;
            imgs[num-1].classList.add('empty-img-input')
            imgs[num-1].removeAttribute('src');
            imgsToShow[num-1].removeAttribute('src');

            removeFromList(num-1);
        }

        for(var z = 0; z < imgsToShow.length; z++){
            if(imgsToShow[z].src == ''){
                imgsToShow[z].style.display = 'none'
            }
            else{
                imgsToShow[z].style.display = 'block'
            }
        }
    }

var inputimg1 = document.getElementById("imagem1");
var inputimg2 = document.getElementById("imagem2"); 
var inputimg3 = document.getElementById("imagem3"); 
var inputimg4 = document.getElementById("imagem4"); 
var inputimg5 = document.getElementById("imagem5"); 
var inputimg6 = document.getElementById("imagem6"); 
var inputimg7 = document.getElementById("imagem7"); 
var inputimg8 = document.getElementById("imagem8"); 
var inputimg9 = document.getElementById("imagem9"); 
var inputimg10 = document.getElementById("imagem10"); 

var inputimgLabel1 = document.getElementById("imagem1-label");
var inputimgLabel2 = document.getElementById("imagem2-label");
var inputimgLabel3 = document.getElementById("imagem3-label");
var inputimgLabel4 = document.getElementById("imagem4-label");
var inputimgLabel5 = document.getElementById("imagem5-label");
var inputimgLabel6 = document.getElementById("imagem6-label");
var inputimgLabel7 = document.getElementById("imagem7-label");
var inputimgLabel8 = document.getElementById("imagem8-label");
var inputimgLabel9 = document.getElementById("imagem9-label");
var inputimgLabel10 = document.getElementById("imagem10-label");

inputimg1.addEventListener("change", () => inputimgchangeval(1));
inputimg2.addEventListener("change", () => inputimgchangeval(2));
inputimg3.addEventListener("change", () => inputimgchangeval(3));
inputimg4.addEventListener("change", () => inputimgchangeval(4));
inputimg5.addEventListener("change", () => inputimgchangeval(5));
inputimg6.addEventListener("change", () => inputimgchangeval(6));
inputimg7.addEventListener("change", () => inputimgchangeval(7));
inputimg8.addEventListener("change", () => inputimgchangeval(8));
inputimg9.addEventListener("change", () => inputimgchangeval(9));
inputimg10.addEventListener("change", () => inputimgchangeval(10));

    /* TABLE SHOWING */

    var table = document.getElementById('carossel');

    function tableEditToggle(){
        table.classList.toggle('tableOut');
    }
    
    /* MODAL */
    var modal = document.getElementById("modal");
    var activeModal = false;

    function appearModal(){
        if(activeModal){
            activeModal = false;
            modal.classList.remove('appearModal');
        }
        else{
            activeModal = true;
            modal.classList.add('appearModal');
        }
    }
    function removeFromList(num){
        listActives.splice(num);
        listActives.sort();
        generateList();
    }
    function generateList(){
        listActives = [];
        var inputs = document.getElementsByClassName("input-file")

        for(var y = 0; y < img_spread.length; y++){
            if(inputs[y].value != ''){
                listActives.push(y);
                listActives.sort();
            }
        }
    }
    function contains(obj) {
        for (var i = 0; i < img_spread.length; i++) {
            if (listActives[i] === obj) {
                return true;
            }
        }
        return false;
    }
    function callModal(num){
        generateList();

        if(contains(num-1)){
            if(modal.classList.contains('appearModal')){
                buildModal(num-1);
            }
            else{
                appearModal();
                buildModal(num-1);
            }
        }
    }
    function buildModal(n){
        img_modal = document.getElementById('img-container');

        img_modal.src = imgs[n].src;

        current = n;
    }
    function toLast(){
        var newT = 0;
        for(var t = 0; t < listActives.length; t++){
            if(listActives[t] == current){
                if(current == listActives[0]) newT = listActives[listActives.length - 1];
                else{
                    newT = listActives[t-1];
                }

                buildModal(newT);
                break;
            }
        }
    }
    function toNext(){
        var newT = 0;
        for(var t = 0; t < listActives.length; t++){
            if(listActives[t] == current){
                if(current == listActives[listActives.length - 1]) newT = listActives[0];
                else{
                    newT = listActives[t+1];
                }

                buildModal(newT);
                break;
            }
        }
    }

    /* SET AS RIGHT */

    function setAsRight(val){

        val -= 1;

        for(var i = 0; i < 4; i++){
            opps[i].classList.remove("correctOne");
        }
        opps[val].classList.add("correctOne");

        console.log(opps[val])

        var sett = 0;

        if(val == 0) sett = 'a';
        if(val == 1) sett = 'b';
        if(val == 2) sett = 'c';
        if(val == 3) sett = 'd';

        var input_correct = document.getElementById('certa');
        input_correct.value = sett;
    }









    /* KEYS */

    document.addEventListener('keyup', (event) => {
        var name = event.key;
        if (name === 'ArrowLeft' && activeModal) {
            toLast();
        }
        if (name === 'ArrowRight' && activeModal) {
            toNext();
        }
        if (name === 'Escape' && activeModal) {
            appearModal();
        }

      }, false);

    getTheme();
    spread();
    switchedit();
    

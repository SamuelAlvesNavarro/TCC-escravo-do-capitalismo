let current = -1;
        let listActives = [];
        let inplace = ["<h1>", "</h1>", "<h2>", "</h2>"];
        let replace = ["*1", "/*1", "*2", "/*2"];

        var body = document.querySelector('body');
        var hmax = body.offsetHeight;

        var imgsToShow = document.getElementsByClassName('imgsToShow');
        var refsToShow = document.getElementsByClassName('ref-input-input');

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
            botar()

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

        }



        /* EDIT MODE */

        var toggleEdit = document.getElementById("edit-bt");
        var editIcon = document.getElementById("edit-icon");
        var main = document.getElementById("main");
        var containerImgs = document.getElementById("containerImgs");
        var refs = document.getElementById("refs"); 
        var quest = document.getElementById("quest");
        var prof_c = document.getElementById("copy_prof");

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
            document.getElementById("edit-part-d").style.display = "none";
            document.getElementById("containerImgs").style.display = "none";
            prof_c.style.display = "none";
            edit = false;
            toggleEditAll();

        }else{
            edit = true;
            editIcon.classList.remove('fa-pencil');
            editIcon.classList.add('fa-eye');
            main.classList.add('edit');
            containerImgs.classList.add('edit');
            refs.classList.add('edit');
            quest.classList.add('edit');
            document.getElementById("edit-part-d").style.display = "flex";
            document.getElementById("containerImgs").style.display = "block";
            prof_c.style.display = "block";
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

    /* IMG FILES */

    function inputimgchangeval(num){
        if(num > 0){
            inputLchange = eval("inputimgLabel"+num);
            inputIchange = eval("inputimg"+num);
            inputLchange.innerHTML = inputIchange.files[0].name;

            var inputimg = document.getElementsByClassName("input-file");
            
            
                const [file] = inputimg[num-1].files
                if (file) {
                    imgsToShow[num-1].src = URL.createObjectURL(file)
                    generateList();
                }

            checkBts()
        }
        if(num < 0){
            num *= -1;
            inputLchange = eval("inputimgLabel"+num);
            inputIchange = eval("inputimg"+num);
            inputLchange.innerHTML = "Imagem " + num;
            inputIchange.value = null;
            imgsToShow[num-1].removeAttribute('src');

            removeFromList(num-1);
            checkBts()
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

        for(var y = 0; y < 10; y++){
            if(inputs[y].value != ''){
                listActives.push(y);
                listActives.sort();
            }
        }
    }
    function contains(obj) {
        for (var i = 0; i < 10; i++) {
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

        img_modal.src = imgsToShow[n].src;

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
    switchedit();



















    var result = document.getElementById("pre-history");
        var input_ = document.getElementById("story-input-b");
        var inputimg = document.getElementsByClassName("input-file")

        function returnUrl(num){
            const [file] = inputimg[num-1].files
            if (file) {
                return URL.createObjectURL(file);
            }
        }
        function botar(){
            var texto = "<div class='text'>" + input_.value + "</div>";
            var textoSave = "<div class='text'>" + input_.value + "</div>";

            for(var i = 1; i <= 10; i++){
                let url = returnUrl(i)
                texto = texto.replace(new RegExp("<img"+i+">", "g"), 
                    "</div>"+
                        "<div class='img_story'>"+
                            "<img src='"+url+"'>"+
                        "</div>"+
                    "<div class='text'>"
                )

                textoSave = textoSave.replace(new RegExp("<img"+i+">", "g"), 
                    "</div>"+
                        "<div class='img_story'>"+
                            "<img"+i+">"+
                        "</div>"+
                    "<div class='text'>"
                )

            }

            texto = texto.replace(new RegExp("<hr>", "g"), 
                    "</div>"+
                        "<div class='hr_space'>"+
                            "<hr>"+
                        "</div>"+
                    "<div class='text'>"
                )
            textoSave = textoSave.replace(new RegExp("<hr>", "g"), 
                    "</div>"+
                        "<div class='hr_space'>"+
                            "<hr>"+
                        "</div>"+
                    "<div class='text'>"
                )

            textoSave = textoSave.replace(new RegExp("<div class='text'></div>", "g"), 
                ""
            )

            texto = texto.replace(new RegExp("<div class='text'></div>", "g"), 
                ""
            )

            result.innerHTML = texto;

            document.getElementById("code_s").value = textoSave;
        }

        function mudar(tag){
            var comeco = input_.selectionStart;
            var fim = input_.selectionEnd;

            var current_texto = input_.value;

            current_texto = 
                current_texto.slice(0, comeco) + "<"+tag+">" 
                + current_texto.slice(comeco, fim)
                + "</"+tag+">"
                + current_texto.slice(fim)


            result.innerHTML = current_texto
            input_.value = current_texto
        }

        function strong(){
           mudar("strong");
        }
        function italic(){
           mudar("i");
        }
        function small(){
           mudar("small");
        }
        function underline(){
            mudar("u");
         }
        function h(which){
           mudar("h"+which);
        }
        function hr(){
            var comeco = input_.selectionStart;

            var current_texto = input_.value;

            current_texto = current_texto.slice(0, comeco) 
            + "<hr>"
            +  current_texto.slice(comeco) 

            input_.value = current_texto

            botar()
        }
        function addImg(num){
           var comeco = input_.selectionStart;

           var current_texto = input_.value;

           current_texto = current_texto.slice(0, comeco) 
           + "<img"+num+">"
           +  current_texto.slice(comeco) 

           input_.value = current_texto

           botar()

        }



        var btsImg = document.getElementsByClassName("img-bt");
        var btsImgBar = document.getElementsByClassName("img-bt-bar");

        function checkBts(){
            for(var i = 0; i < 10; i++){
                var num = "imagem"+(i+1);

                var inputCheck = document.getElementById(num);

                if(inputCheck.value != ''){
                    btsImg[i].classList.remove("hidden-bt-img")
                    btsImgBar[i].classList.remove("hidden-bt-img")
                }else{
                    btsImg[i].classList.add("hidden-bt-img")
                    btsImgBar[i].classList.add("hidden-bt-img")
                }
            }
        }

        checkBts()



        var onfucusInput = false;

        function IsFocus(){
            onfucusInput = true
        }
        function IsOutFocus(){
            onfucusInput = false
        }

        document.addEventListener('keyup', (event) => {
            var name = event.key;
            if (name === 'Tab' && onfucusInput) {

                var comeco = input_.selectionStart;

                var current_texto = input_.value;

                current_texto = current_texto.slice(0, comeco) 
                + "     "
                +  current_texto.slice(comeco) 

                input_.value = current_texto

                botar()
            }
        }, false);











window.addEventListener("scroll", reveal);

function reveal(){

    var bar_to_show = document.getElementById("floating-bar");

    var bar_p_t = document.getElementById("edit-part-d");

    var windowH = document.documentElement.scrollTop;

    var bar_p_t_h = bar_p_t.getBoundingClientRect().bottom;
    var revealpoint_bar_p_t = +300;

    var history_text = document.getElementById("story-input-b")

    var histor_h = history_text.getBoundingClientRect().bottom;


    if(bar_p_t_h + revealpoint_bar_p_t < windowH && histor_h + 800 > windowH){
        bar_to_show.classList.add("float-bar")
    }else{
        bar_to_show.classList.remove("float-bar")
    }
}
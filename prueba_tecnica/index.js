const btnStartRecord = document.getElementById('btnStartRecord');
const btnCleanRecord = document.getElementById('btnCleanRecord');
const btnCleanRecord1 = document.getElementById('btnCleanRecord1');
const btnCleanRecord2 = document.getElementById('btnCleanRecord2');
const btnCleanRecord3 = document.getElementById('btnCleanRecord3');
const btnCleanRecord4 = document.getElementById('btnCleanRecord4');
const btnCleanRecord5 = document.getElementById('btnCleanRecord5');
const btnCleanRecord6 = document.getElementById('btnCleanRecord6');
const btnCleanRecord7 = document.getElementById('btnCleanRecord7');
const texto = document.getElementById('text');
const texto1 = document.getElementById('text1');
const texto2 = document.getElementById('text2');
const texto3 = document.getElementById('text3');
const texto4 = document.getElementById('text4');
const texto5 = document.getElementById('text5');
const texto6 = document.getElementById('text6');
const texto7 = document.getElementById('text7');


let recognition = new webkitSpeechRecognition();
recognition.lang = 'es-ES';
if(recognition.continuous == true){
    
    recognition.abort();
}
else{
    btnStartRecord.addEventListener('click', () =>{
        recognition.start();
    });
}

recognition.interimResults = false;

    btnCleanRecord.addEventListener('click', () =>{
        document.getElementById("text").value="";
    });   
    btnCleanRecord1.addEventListener('click', () =>{
        document.getElementById("text1").value="";
    });    
    btnCleanRecord2.addEventListener('click', () =>{
        document.getElementById("text2").value="";
    });    
    btnCleanRecord3.addEventListener('click', () =>{
        document.getElementById("text3").value="";
    });  
    btnCleanRecord4.addEventListener('click', () =>{
        document.getElementById("text4").value="";
    });  
    btnCleanRecord5.addEventListener('click', () =>{
        document.getElementById("text5").value="";
    });     
    btnCleanRecord6.addEventListener('click', () =>{
        document.getElementById("text6").value="";
    });     
    btnCleanRecord7.addEventListener('click', () =>{
        document.getElementById("text7").value="";
    });        

recognition.onresult = (event) =>{
    const results = event.results;
    const frase = results[results.length - 1][0].transcript;
    texto.value += frase;    
    console.log(results);
}





    

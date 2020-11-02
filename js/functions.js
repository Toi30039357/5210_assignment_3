// Navbar collapse for mobile
function navFunction() 
{
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
}

// TextToSpeech
function TextToSpeechPara()
{
    const speech2 = new SpeechSynthesisUtterance();
    let voices2 = speechSynthesis.getVoices();
    let convert2 = document.getElementById("readMe").innerHTML;
    speech2.text = convert2;
    speech2.volume = .6;
    speech2.rate = 1.5;
    speech2.pitch = 2;
    speech2.voice = voices2[1];
    window.speechSynthesis.speak(speech2)
}

//interatividade entre os botoes iniciar e terminar, podendo assim um tornar disabilitado ou nao o outro e colorir .....

var vetorClassBotaoIniciar = document.getElementsByClassName('camecaPartida_B');        
for(var i = 0; i < 2;i++){
    vetorClassBotaoIniciar[i].addEventListener("click", IniciouPartida);
}
function IniciouPartida(){
        document.getElementById("T"+(this.name)).removeAttribute("disabled");
        this.style.backgroundColor = "lime";
        this.style.color = "black";
        
        ocultaRestoMarcadoresDeinicio(this.id[1]);
    }

var pogress = 0;
var vetorClassPogress_Rodada = document.getElementsByClassName('TerminarPartida_B');        
for(var i = 0; i < 2;i++){
    vetorClassPogress_Rodada[i].addEventListener("click", Pogress_Rodada);
    vetorClassPogress_Rodada[i].className = 'TerminarPartida_B btn btn-default enable';//ta errado
}
function Pogress_Rodada(){    
        
    pogress+=50;
    
    var botaoComecar_auxilio = document.getElementById("I"+this.id[1]);
    
    document.getElementById(this.id).setAttribute("disabled", "disabled");
    
    botaoComecar_auxilio.style.backgroundColor = this.style.backgroundColor;
    botaoComecar_auxilio.className = "camecaPartida_B btn btn-default disabled";
    botaoComecar_auxilio.setAttribute("disabled", "disabled");
    ocultaMarcadoresDeinicio(botaoComecar_auxilio.id[1]);
    
    document.getElementById("progress_bar").style.width = (pogress+'%');
    //document.getElementById("sei").className = 'btn btn-primary btn-lg disabled';
        
    //this.className = 'TerminarPartida_B btn btn-default disabled';
    
    if(pogress >= 100){
        document.getElementsByTagName("button")[12].removeAttribute("disabled");
    }
}

document.getElementById("sei").addEventListener("click", function(){
    alert("Começando nova partida.");
});


//Selecionador para exibição de imagem--------------------------------------------------------------------------------------
var img1 = document.getElementById("0");
var img2 = document.getElementById("1");
var img3 = document.getElementById("2");
var img4 = document.getElementById("3");
var img5 = document.getElementById("4");

img1.style.display = 'block';
img2.style.display = 'none';
img3.style.display = 'none';
img4.style.display = 'none';
img5.style.display = 'none';

document.getElementById("StreetFight_B").addEventListener("click", function(){
    gameGerenciado = "StreetFight";
    
    img1.style.display = 'none';
    img2.style.display = 'block';
    img3.style.display = 'none'; 
    img4.style.display = 'none';
    img5.style.display = 'none';
});
document.getElementById("JustDance_B").addEventListener("click", function(){
    gameGerenciado = "JustDance";
    
    img1.style.display = 'none';
    img2.style.display = 'none';
    img3.style.display = 'block'; 
    img4.style.display = 'none';
    img5.style.display = 'none';
});
document.getElementById("FIFA_B").addEventListener("click", function(){
    gameGerenciado = "FIFA";
    
    img1.style.display = 'none';
    img2.style.display = 'none';
    img3.style.display = 'none'; 
    img4.style.display = 'block';
    img5.style.display = 'none';
});
document.getElementById("PES_B").addEventListener("click", function(){
    gameGerenciado = "PES";
    
    img1.style.display = 'none';
    img2.style.display = 'none';
    img3.style.display = 'none'; 
    img4.style.display = 'none';
    img5.style.display = 'block';
});

var gameGerenciado;
var gameGerenciaveis = [];
gameGerenciaveis[0] = "StreetFight";
gameGerenciaveis[1] = "JustDance";
gameGerenciaveis[2] = "FIFA";
gameGerenciaveis[3] = "PES";

function ocultaRestoMarcadoresDeinicio(secaoPresionada){    
    for(var i = 0; i < 4; i++){
        document.getElementById("Marcador_"+secaoPresionada+"_"+gameGerenciaveis[i]).style.display = 'none'; 
    }
    document.getElementById("Marcador_"+secaoPresionada+"_"+gameGerenciado).style.display = 'block'; 

}
function ocultaMarcadoresDeinicio(secaoPresionada){
    for(var i = 0; i < 4; i++){
        document.getElementById("Marcador_"+secaoPresionada+"_"+gameGerenciaveis[i]).style.display = 'none'; 
    }
}
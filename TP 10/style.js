function calcul_moyenne(){
var n1=prompt("donner la premiere note ")
var n2=prompt("donner la deuxieme note ")
var n3=prompt("donner la troisieme  note ")

var somme = Number(n1)+Number(n2)+Number(n3);

document.write("voici la somme: "+somme+"<br>");
var moyenne = somme/3;
document.write("voici la moyenne:"+moyenne+"<br>");
if(moyenne<10){
    document.write("vous n'etes pas admis ");
}
else{
    document.write ("vous etes admis !");
}
}
function test_age(){
var age = prompt("quelle est votre age ?");
if(age <18){
    document.write("vous etes mineur ");
    document.bgColor="red"

}
else{document.write("vous etes majeur ");
    document.bgColor="green"
}
}

function simple_affichage(){
    var name = prompt("Donner votre nom");
    let prenom = prompt("Donner votre prénom");

    document.write('<div style="margin:auto; width:300px; border : 2px solid blue;">')
    document.write("Bonjour" + prenom +""+ name);
    document.write('</div>');
}
function test_couleur(){
    let couleur = prompt("Donner un couleur");
    if (couleur == "rouge"|| couleur== "red"){document.body.style.backgroundColor = "red"
    }
   else  if (couleur == "bleu"|| couleur== "blue"){document.body.style.backgroundColor = "blue"
    }
     else  if (couleur == "vert"|| couleur== "green"){document.body.style.backgroundColor = "green"
    }
 else  if (couleur == "pink"|| couleur== "pink"){document.body.style.backgroundColor = "pink"
    }
    else{
        document.write("Couleur non comprise")
    }
}

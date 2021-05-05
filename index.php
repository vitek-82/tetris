<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>

body {
    margin: 0;
    padding: 0;
}
td {
    width: 10px;
    height: 10px;
    border: 1px solid;
}
  </style>
}
</head>
<body>

<script>


document.body.innerHTML = '<table><tbody>'+Array(21).join('<tr>'+Array(11).join('<td></td>')+'</tr>');

var elems = document.querySelectorAll('tr');

var Fig = {
  'line': [[0,3],[0,4],[0,5],[0,6]],
  'cube': [[0,4],[0,5],[1,4],[1,5]],
  'l1': [[0,3],[0,4],[0,5],[1,5]],
  'l2': [[1,3],[0,3],[0,4],[0,5]],

};
var nameFigure = null;

var l1POS = 1;
var l2POS = 1;
function selectFig(){
  nameFigure = Object.keys(Fig)[Math.floor(Math.random()*Object.keys(Fig).length)];
  return Fig[nameFigure];
};

class obj{

  constructor(name){
    this.figure = [];
    this.arr = name;
  };
  getNewFigure(name){
    this.figure = [];
    this.arr = name;
  };

  getFigure(){
      for(let i = 0; i < 4; i++){
        this.figure[i] = elems[this.arr[i][0]].children[this.arr[i][1]];
        this.figure[i].style.background = '#333';
       };
       return this.figure;
  };

  changeFigure(){
    if(nameFigure == 'line'){
      if(this.figure[0].parentElement == this.figure[1].parentElement){
        var r = this.figure[1].cellIndex;
        for(var i = 3; i > -1; i--){
          this.figure[i].style.background = '';
          this.figure[i] = elems[this.figure[0].parentElement.rowIndex + i].children[r];
          this.figure[i].style.background = '#333';
        };
      }
      else{
        if(this.figure[3].cellIndex + 4 > 10){
          var o = 0;
          for(var i = 0; i < 4; i++){
            this.figure[i].style.background = '';
            this.figure[i] = this.figure[0].parentElement.children[6 + o];
            this.figure[i].style.background = '#333';
            o++;
          };
        }
        else{
          if(this.figure[0].cellIndex == 0){
            this.move(39);
          };
          var r = this.figure[0].cellIndex;
          for(var i = 0; i < 4; i++){
            this.figure[i].style.background = '';
            this.figure[i] = this.figure[0].parentElement.children[r - 1 + i];
            this.figure[i].style.background = '#333';
          };
        };
      };
    }
    else if(nameFigure == 'l1'){
      switch(l1POS){
        case 1:
          this.figure[3].style.background = '';
          this.figure[3] = this.figure[3].parentElement.nextElementSibling.children[this.figure[3].cellIndex - 1];
          this.figure[3].style.background = '#333';
          this.figure[2].style.background = '';
          this.figure[2] = this.figure[2].parentElement.nextElementSibling.nextElementSibling.children[this.figure[2].cellIndex];
          this.figure[2].style.background = '#333';
          this.figure[1].style.background = '';
          this.figure[1] = this.figure[1].parentElement.nextElementSibling.children[this.figure[1].cellIndex + 1];
          this.figure[1].style.background = '#333';
          this.figure[0].style.background = '';
          this.figure[0] = this.figure[0].nextElementSibling.nextElementSibling;
          this.figure[0].style.background = '#333';
          l1POS = 2;
          break;
        case 2:
        for(var z = 0; z < 4; z++){
          if(this.figure[z].cellIndex -1 < 0){
            this.move(39);
            break;
          };
        };
          this.figure[3].style.background = '';
          this.figure[3] = this.figure[3].parentElement.previousElementSibling.previousElementSibling.children[this.figure[3].cellIndex - 1];
          this.figure[3].style.background = '#333';
          this.figure[2].style.background = '';
          this.figure[2] = this.figure[2].parentElement.previousElementSibling.children[this.figure[2].cellIndex - 2];
          this.figure[2].style.background = '#333';
          this.figure[1].style.background = '';
          this.figure[1] = this.figure[1].previousElementSibling;
          this.figure[1].style.background = '#333';
          this.figure[0].style.background = '';
          this.figure[0] = this.figure[0].parentElement.nextElementSibling.children[this.figure[0].cellIndex];
          this.figure[0].style.background = '#333';
          l1POS = 3;
          break;
        case 3:
          this.figure[3].style.background = '';
          this.figure[3] = this.figure[3].nextElementSibling;
          this.figure[3].style.background = '#333';
          this.figure[2].style.background = '';
          this.figure[2] = this.figure[2].parentElement.previousElementSibling.children[this.figure[2].cellIndex];
          this.figure[2].style.background = '#333';
          this.figure[1].style.background = '';
          this.figure[1] = this.figure[1].previousElementSibling;
          this.figure[1].style.background = '#333';
          this.figure[0].style.background = '';
          this.figure[0] = this.figure[0].parentElement.nextElementSibling.children[this.figure[0].cellIndex - 2];
          this.figure[0].style.background = '#333';
          l1POS = 4;
          break;
        case 4:
        for(var z = 0; z < 4; z++){
          if(this.figure[z].cellIndex +1 > 9){
            this.move(37);
            break;
          };
        };
          this.figure[3].style.background = '';
          this.figure[3] = this.figure[3].parentElement.nextElementSibling.children[this.figure[3].cellIndex + 1];
          this.figure[3].style.background = '#333';
          this.figure[2].style.background = '';
          this.figure[2] = this.figure[2].nextElementSibling.nextElementSibling;
          this.figure[2].style.background = '#333';
          this.figure[1].style.background = '';
          this.figure[1] = this.figure[1].parentElement.previousElementSibling.children[this.figure[1].cellIndex + 1];
          this.figure[1].style.background = '#333';
          this.figure[0].style.background = '';
          this.figure[0] = this.figure[0].parentElement.previousElementSibling.previousElementSibling.children[this.figure[0].cellIndex];
          this.figure[0].style.background = '#333';
          l1POS = 1;
          break;
      };
    }
    else if(nameFigure == 'l2'){
      switch(l2POS){
        case 1:
          this.figure[3].style.background = '';
          this.figure[3] = this.figure[3].parentElement.nextElementSibling.nextElementSibling.children[this.figure[3].cellIndex];
          this.figure[3].style.background = '#333';
          this.figure[2].style.background = '';
          this.figure[2] = this.figure[2].parentElement.nextElementSibling.children[this.figure[2].cellIndex + 1];
          this.figure[2].style.background = '#333';
          this.figure[1].style.background = '';
          this.figure[1] = this.figure[1].nextElementSibling.nextElementSibling;
          this.figure[1].style.background = '#333';
          this.figure[0].style.background = '';
          this.figure[0] = this.figure[0].parentElement.previousElementSibling.children[this.figure[0].cellIndex + 1];
          this.figure[0].style.background = '#333';
          l2POS = 2;
          break;
        case 2:
        for(var z = 0; z < 4; z++){
          if(this.figure[z].cellIndex -1 < 0){
            this.move(39);
            break;
          };
        };
          this.figure[3].style.background = '';
          this.figure[3] = this.figure[3].parentElement.previousElementSibling.children[this.figure[3].cellIndex - 2];
          this.figure[3].style.background = '#333';
          this.figure[2].style.background = '';
          this.figure[2] = this.figure[2].previousElementSibling;
          this.figure[2].style.background = '#333';
          this.figure[1].style.background = '';
          this.figure[1] = this.figure[1].parentElement.nextElementSibling.children[this.figure[1].cellIndex];
          this.figure[1].style.background = '#333';
          this.figure[0].style.background = '';
          this.figure[0] = this.figure[0].nextElementSibling;
          this.figure[0].style.background = '#333';
          l2POS = 3;
          break;
        case 3:
          this.figure[3].style.background = '';
          this.figure[3] = this.figure[3].parentElement.previousElementSibling.children[this.figure[3].cellIndex];
          this.figure[3].style.background = '#333';
          this.figure[2].style.background = '';
          this.figure[2] = this.figure[2].previousElementSibling;
          this.figure[2].style.background = '#333';
          this.figure[1].style.background = '';
          this.figure[1] = this.figure[1].parentElement.nextElementSibling.children[this.figure[1].cellIndex - 2];
          this.figure[1].style.background = '#333';
          this.figure[0].style.background = '';
          this.figure[0] = this.figure[0].parentElement.nextElementSibling.nextElementSibling.children[this.figure[0].cellIndex - 1];
          this.figure[0].style.background = '#333';
          l2POS = 4;
          break;
        case 4:
        for(var z = 0; z < 4; z++){
          if(this.figure[z].cellIndex +1 > 9){
            this.move(37);
            break;
          };
        };
          this.figure[3].style.background = '';
          this.figure[3] = this.figure[3].nextElementSibling.nextElementSibling;
          this.figure[3].style.background = '#333';
          this.figure[2].style.background = '';
          this.figure[2] = this.figure[2].parentElement.previousElementSibling.children[this.figure[2].cellIndex + 1];
          this.figure[2].style.background = '#333';
          this.figure[1].style.background = '';
          this.figure[1] = this.figure[1].parentElement.previousElementSibling.previousElementSibling.children[this.figure[1].cellIndex];
          this.figure[1].style.background = '#333';
          this.figure[0].style.background = '';
          this.figure[0] = this.figure[0].parentElement.previousElementSibling.children[this.figure[0].cellIndex - 1];
          this.figure[0].style.background = '#333';
          l2POS = 1;
          break;
      };
    }
    else{return;};
  };

  drum(a){
    var x = true;
    if(a == 'l'){
      for(let i = 0; i < 4; i++){
        if(this.figure[i].cellIndex == 0 || this.figure[i].previousElementSibling.className == 'qqq'){
          x = false;
          break;
        };
      };
    }
    if(a == 'r'){
      for(let i = 0; i < 4; i++){
        if(this.figure[i].cellIndex == elems[0].children.length-1 || this.figure[i].nextElementSibling.className == 'qqq'){
          x = false;
          break;
        };
      };
    };
    return x;
  };

  move(x){
    var qqq = [];
    if(x == 37 && this.drum('l')){ // left
      for(var i = 0; i < 4; i++){
        this.figure[i].style.background = '';
        qqq[i] = this.figure[i].previousElementSibling;
        };
      this.figure = qqq;
      for(var t = 0; t < 4; t++){
        this.figure[t].style.background = '#333';
      };
    };
    if(x == 39 && this.drum('r')){ // right
      for(var i = 3; i > -1; i--){
        this.figure[i].style.background = '';
        qqq[i] = this.figure[i].nextElementSibling;
      };
      this.figure = qqq;
      for(var t = 3; t > -1; t--){
        this.figure[t].style.background = '#333';
      };
    };
  };

};

function startGame(){
    var r = new obj(selectFig());
    r.getFigure();
    document.onkeydown = function(e){
      if(e.keyCode == 38){r.changeFigure();};
      if(e.keyCode == 37){r.move(37);};
      if(e.keyCode == 39){r.move(39);};
    };
    var stop = setInterval(
      function(){
        var True = true;
        for(var tr = 0; tr < 4; tr++){
          if(r.figure[tr].parentElement.rowIndex == 19 || r.figure[tr].parentElement.nextElementSibling.children[r.figure[tr].cellIndex].className == 'qqq'){
            True = false;
            break;
          };
        };
        if(True){
                var newFigure = [];
                for(var i = 0; i < 4; i++){
                    r.figure[i].style.background = '';
                    newFigure[i] = r.figure[i].parentElement.nextElementSibling.children[r.figure[i].cellIndex];
                };
                for(var t = 0; t < 4; t++){
                    r.figure[t] = newFigure[t];
                    r.figure[t].style.background = '#333';
                };
        }
        else{
          clearInterval(stop);
          l1POS = 1;
          l2POS = 1;
          for(var z = 0; z < 4; z++){
              r.figure[z].className = 'qqq';
          };
          delete r.figure;
          !function(){
            var arr = [];
            for(var i = 0; i < 20; i++){
              for(var q = 0; q < 10; q++){
                if(elems[i].children[q].style.background == ''){break;}
              };
              if(q == 10){arr[i] = i;};
            };

            var arrNew = arr.filter(function(index){
                  return index != null;});

            for(var i = 0; i < arrNew.length; i++){
                for(var r = 0; r < 10; r++){
                 elems[arrNew[i]].children[r].style.background = '';
                 elems[arrNew[i]].children[r].className = '';
                }; 
            };  
                
                for(var i = 0; i < arrNew.length; i++){
                  for(var t = arrNew[i]; t > 0; t--){
                    for(var e = 0; e < 10; e++){
                      elems[t].children[e].style.background = elems[t].children[e].parentElement.previousElementSibling.children[elems[e].children[e].cellIndex].style.background;
                      elems[t].children[e].className = elems[t].children[e].parentElement.previousElementSibling.children[elems[e].children[e].cellIndex].className;
                      elems[t-1].children[e].className = '';
                    };
                  };
                };
              
            
          }();
          r.getNewFigure(name);
          startGame();
        };
    },300);
};

startGame();





</script>



</body>
</html>
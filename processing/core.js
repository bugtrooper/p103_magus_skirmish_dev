let kaki = true;
let selected_id;
let selected2_id;
let target1_id;
let target2_id;
let i,j,k,l=0;
let action=0;
let source_unit=10;
let unit_swap=0;
let j_map_unit="";
let j_temp={};
let active_unit_indicator;
let active_player_indicator;
let player_unique_id;
let my_units={};
let player_number;


let map_id = [];
let map_terrain = [];
let map_unit = [];
let map_unitfacing = [];
let player_unit = [];
// 1 grass
//initializing the map
for(j=1;j<10;j++)
{
	for(i=1;i<10;i++)
	{
		k=j*1000;
		k=k+i;
		map_id[l] = k;
		map_terrain[l] = 1;
		map_unitfacing[l] = 1;
		map_unit[l] = 0;
		l++;
	}
}
map_unit[30]=1;
map_unit[50]=1;
map_unit[10]=2;
map_unit[70]=2;
function select_player(number)
{
	player_number=number;
}
function game_start()
{
	let xhr = new XMLHttpRequest();
			xhr.open('GET', 'engine.php?initmatch='+player_number, true);

			xhr.onload = function()
			{
				if(this.status == 200)
				{
					j_temp = JSON.parse(this.responseText);
					console.log(j_temp);
				}
			}
			xhr.send();
};

function targeting(id)
{
	document.getElementById(id).innerHTML = "<img src= ../sprites/red.png >";
	target2_id=id;
}
function selection(id)
{
	console.log("selcted:"+id+" command:"+action+" from: "+source_unit);
	let comman = "command="+id+action+source_unit;
	let xhr = new XMLHttpRequest();
	xhr.open('POST', 'engine.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.onload = function(){
		console.log(this.responseText);
	}

	xhr.send(comman);
}
function send()
{
	for(i=1;i<100;i++)
	{
		let ident = "id="+map_id[i]+map_terrain[i];
		let xhr = new XMLHttpRequest();
		xhr.open('POST', 'process_map.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.onload = function(){
			console.log(this.responseText);
		}

		xhr.send(ident);
	}


}
function init()
{
	for(i=0;i<100;i++)
	{
		j_temp[map_id[i]]=map_unit[i];
		console.log(j_temp);
	}
	j_map_unit=JSON.stringify(j_temp);
}
function reiceve()
{
	for(i=1;i<100;i++)
	{
		let ident = "id="+map_id[i];
		let xhr = new XMLHttpRequest();
		xhr.open('GET', 'process_map.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.onload = function(){
			map_unit[i] = this.responseText;
		}
		console.log(map_unit[i]);
		xhr.send(ident);
	}

}
function move_action()
{
	action=1;
	console.log("moving selected");
}
function attack_action()
{
	action=2;
	console.log("attacking selected");
}
function refresh()
{
	getdatafromserver();
	for(k=0;k<81;k++)
	{
		if(j_temp[k].unitid=="2")
		{
			document.getElementById(j_temp[k].id).innerHTML = "<img src=../sprites/50x50_unit_barbarian2.png>";
		}
		if(j_temp[k].unitid=="1")
		{
			document.getElementById(j_temp[k].id).innerHTML = "<img src=../sprites/50x50_unit_barbarian1.png>";
		}
		if(j_temp[k].unitid=="0")
		{
			document.getElementById(j_temp[k].id).innerHTML = "<img src=../sprites/50x50_terrain_grass.png>";
		}
	}

}
function getdatafromserver()
{
	let xhr = new XMLHttpRequest();
      xhr.open('GET', 'engine.php?updatemap=', true);

      xhr.onload = function()
			{
        if(this.status == 200)
				{
          j_temp = JSON.parse(this.responseText);
					console.log(j_temp);
      	}
			}
			xhr.send();
}
function drawline(x0, y0, x1, y1) {
   var dx = Math.abs(x1 - x0);
   var dy = Math.abs(y1 - y0);
   var sx = (x0 < x1) ? 1 : -1;
   var sy = (y0 < y1) ? 1 : -1;
   var err = dx - dy;
   while(true) {
	  document.getElementById(y0*1000+x0).innerHTML = "<img src= ../sprites/green.png >";
      if ((x0 === x1) && (y0 === y1)) break;
      var e2 = 2*err;
      if (e2 > -dy) { err -= dy; x0  += sx; } //err -= dy; err= err-dy;
      if (e2 < dx) { err += dx; y0  += sy; }
   }
}

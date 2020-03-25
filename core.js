let kaki = true;
let selected_id;
let selected2_id;
let target1_id;
let target2_id;
let i,j,k,l=0;
let action=0;
let source_unit=0;

let map_id = [];
let map_terrain = [];
let map_unit = [];
let map_unitfacing = [];
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
function targeting(id)
{
	document.getElementById(id).innerHTML = "<img src= red.png >";
	target2_id=id;
}
function selection(id)
{
	//document.getElementById(id).innerHTML = "<img src= red.png >";
	target1_id=id;
	console.log("selcted"+id);
	let comman = "command=0";
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
	for(i=1;i<100;i++)
	{
		let ident = "id="+map_id[i];
		console.log("id:");
		let xhr = new XMLHttpRequest();
		xhr.open('POST', 'process_map.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		xhr.onload = function(){
			console.log(this.responseText);
		}

		xhr.send(ident);
	}


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
			map_terrain[i] = this.responseText;
		}
		console.log(map_terrain[i]);
		xhr.send(ident);
	}

}
function refresh()
{

	console.log("in refresh");
	l=0;
	for(j=1;j<10;j++)
	{
		for(i=1;i<10;i++)
		{
			k=j*1000;
			k=k+i;
			console.log("k is: "+k);
			console.log("l is: "+l);
			console.log("unit is: "+l);
			if(map_terrain[l] == 1)
			document.getElementById(k).innerHTML = "<img src=./sprites/50x50_terrain_grass.png>";
			l++;
			if(map_unit[l] == 1)
			{
				document.getElementById(k).innerHTML = "<img src=./sprites/50x50_unit_barbarian1.png>";
				console.log("barbarian found");
			}
			if(map_unit[l] == 2)
			{
				document.getElementById(k).innerHTML = "<img src=./sprites/50x50_unit_barbarian2.png>";
				console.log("barbarian2 found");
			}
		}
	}
	//document.getElementById(8004).innerHTML = "<img src=./sprites/50x50_unit_barbarian1.png>";
}
function drawline(x0, y0, x1, y1) {
   var dx = Math.abs(x1 - x0);
   var dy = Math.abs(y1 - y0);
   var sx = (x0 < x1) ? 1 : -1;
   var sy = (y0 < y1) ? 1 : -1;
   var err = dx - dy;
   while(true) {
	  document.getElementById(y0*1000+x0).innerHTML = "<img src= green.png >";
      if ((x0 === x1) && (y0 === y1)) break;
      var e2 = 2*err;
      if (e2 > -dy) { err -= dy; x0  += sx; } //err -= dy; err= err-dy;
      if (e2 < dx) { err += dx; y0  += sy; }
   }
}

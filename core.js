let kaki = true;
let selected_id;
let selected2_id;
let target1_id;
let target2_id;
let i,j,k,l=0;

let map_id = [];
let map_terrain = [];
for(j=1;j<10;j++)
{
	for(i=1;i<10;i++)
	{
		k=j*1000;
		k=k+i;
		map_id[l]=k;
		map_terrain[l]=1;
	}
}

function targeting(id)
{
	document.getElementById(id).innerHTML = "<img src= red.png >";
	target2_id=id;
}
function selection(id)
{
	document.getElementById(id).innerHTML = "<img src= red.png >";
	target1_id=id;
	console.log("selcted"+id);
}
function send()
{
	e.preventDefault();
	for(i=1;i<100;i++)
	{
		let params = map_id[i];

		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'process_map.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhr.onload = function(){
			console.log(this.responseText);
		}

		xhr.send(params);
	}


}
function reiceve()
{

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

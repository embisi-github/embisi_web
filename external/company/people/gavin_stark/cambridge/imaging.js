function add_point( file, description ) {
	var i;
	var j;
	var n;
	var numbers;
	i = 0;
	n = 0;
	numbers = new Array();
	for (i=0; i<file.length; i=j+1) {
		j = file.indexOf("_",i);
		if (j<0) {j=file.length;}
		numbers[n] = parseInt(file.substring(i,j));
		n++;
	}
	cx = numbers[0];
	cy = numbers[1];
	lx = Math.round(cx+gran*Math.cos((numbers[2]+numbers[3])/2.0*3.14159/180));
	ly = Math.round(cy-gran*Math.sin((numbers[2]+numbers[3])/2.0*3.14159/180));
	rx = Math.round(cx+gran*Math.cos((numbers[2]-numbers[3])/2.0*3.14159/180));
	ry = Math.round(cy-gran*Math.sin((numbers[2]-numbers[3])/2.0*3.14159/180));
	area_list[no_areas] = new Array( cx, cy, lx, ly, rx, ry );
	file_list[no_areas] = file;
	description_list[no_areas] = description;
	no_areas++;
	if (no_areas<2) {
		for (i=0; i<640; i+=gran) {
			for (j=0; j<680; j+=gran) {
				document.write("<area shape=rect coords=");
				document.write(i+","+j+",");
				document.write((i+gran)+","+(j+gran));
				document.write(" href='javascript:display_images(display_list);'");
				document.write(" onMouseOver='set_status("+i+","+j+")'");
				document.write(" onMouseOut='set_status("+i+","+j+")'>");
			}
		}
	}
	numbers = null;
}

function delayed_set_status() {
	window.status = image_list;
	window.defaultStatus = image_list;
	timer = null;
	timer = window.setTimeout("delayed_set_status()",200);
}

function is_within( x, y, x0, y0, x1, y1 ) {
	return ((x>=x0) && (y>=y0) && (x<=x1) && (y<=y1))
}

function is_overlapping( tri, x, y ) {
	if (is_within(tri[0],tri[1],x,y,x+gran,y+gran))
		return 1;
	if (is_within(tri[2],tri[3],x,y,x+gran,y+gran))
		return 1;
	if (is_within(tri[4],tri[5],x,y,x+gran,y+gran))
		return 1;
	return 0;
}

function set_status(x,y) {
	var i;
	var n;
	for (i=0; i<images.length; i++) {
		images[i] = -1;
	}
	for (i=0,n=0; i<area_list.length; i++) {
		if (is_overlapping(area_list[i],x,y)) {
			images[n] = i;
			n++;
		}
	}
	image_list = "";
	display_list = "";
	for (i=0; i<images.length; i++) {
		if (images[i] >= 0) {
			image_list += " \""+description_list[images[i]]+"\"";
			display_list += file_list[images[i]]+" "+escape(description_list[images[i]])+" ";
		}
	}
	if (timer) {
		window.clearTimeout( timer );
	}
	timer = window.setTimeout("delayed_set_status()",200);
	return true;
}

function escape( s ) {
	var i;
	var r;
	r="";
	for (i=0; i<s.length; i++) {
		if (s.charAt(i)==" ") {
			r+="_";
		} else {
			r+=s.charAt(i);
		}
	}
	return r;
}

function display_images( images ) {
	image_window = window.open("", "ImageWindow",
					"toolbar=0,location=0,directories=0,status=1,menubar=1,scrollbars=1,resizable=1,copyhistory=0,width=640,height=400");

	image_window.document.open();
	image_window.document.write("<HTML>" +
					"<HEAD>" +
					"<TITLE>Cambridge images</TITLE>" + 
					"</HEAD>" +
					"<BODY background=paper.jpg>" +
					"<div align=center><h2>Images of Cambridge</h2>" );
	for (i=0; i<images.length; i=k+1) {
		j = images.indexOf(" ",i);
		if (j==-1) {j=images.length;}
		k = images.indexOf(" ",j+1);
		if (k==-1) {k=images.length;}
		image = images.substring(i,j);
		input_text = images.substring(j+1,k);
		text="";
		for (i=0; i<input_text.length; i++) {
			ch = input_text.charAt(i);
			if ((ch=="{") || (ch=="}")) {
			} else if (ch=="_") {
				text=text+" ";
			} else {
				text=text+ch;
			}
		}
		image_window.document.write("<img src="+image+" alt='Cambridge image "+image+"'><br><h3>"+text+"</h3><p>");
	}
	image_window.document.write("<font size=2><i>This site is &copy 1997 and maintained by <A HREF='mailto:gjs@cantabds.demon.co.uk'>Gavin J Stark</A> of <a target='_opener' href='http://www.cantabds.demon.co.uk'>Cantab Design Services</a>.</i></font></div>" +
					"</BODY>" +
					"</html>"
					);
	image_window.document.close();

}

area_list = new Array();
file_list = new Array();
description_list = new Array();
images = new Array();
images[0] = -1;
no_areas = 0;
gran = 32;
timer = null;
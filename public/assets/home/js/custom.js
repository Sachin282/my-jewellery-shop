function countdown(){
	var now = new Date();
	var eventDate = new Date(now.getFullYear(), 11, 25);
	var currtime = now.getTime();
	var eventTime = new eventDate.getTime();
	var remTime = eventTime - currtime;
	var s,m,h,d;
	s =Math.floor(remTime / 1000);
	m =Math.floor(s / 60);
	h =Math.floor(m / 60);
	d =Math.floor(h / 24);

	h%=24;
	m%=60;
	s%=60;

	h = (h<10)?"0"+h:h;
	m = (m<10)?"0"+m:m;
	s = (s<10)?"0"+s:s;

	document.getElementById('days').textContent = d;
	document.getElementById('days').innerText = d;
	
	document.getElementById('hours').textContent = h;
	document.getElementById('minutes').textContent = m;
	document.getElementById('seconds').textContent = s;
}

// var modal = document.getElementById('simpleModal');
// var modalBtn = document.getElementById('modalBtn');
// var closeBtn = document.getElementById('closeBtn');

// modalBtn.addEventListener('click',function openModal(){
// 	alert('sachin');
// 	// modal.style.display = 'block';
// });

// closeBtn.addEventListener('click',function closenModal(){
// 	modal.style.display = 'none';
// });
// window.addEventListener('click',closeModal_OutsideClick);



// function closeModal_OutsideClick(e){
// 	if(e.target == 'modal'){
// 		modal.style.display = 'none';
// 	}
// }

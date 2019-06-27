//Date
(function(){
    
    var refreshHour = function(){
        var date = new Date(),
            day = date.getDay(),
            numberDay = date.getDate(),
            month = date.getMonth(),
            year = date.getFullYear();
        
        
    var pDay = document.getElementById('day'),
        pNumberDay = document.getElementById('numberDay'),
        pMonth = document.getElementById('month'),
        pYear = document.getElementById('year');
    
        
    var days = [
        "Domingo", "Lunes", "Martes",
        "Miércoles", "Jueves", "Viernes", "Sábado"
      ];
        
        pDay.textContent = days[day];
        pNumberDay.textContent = numberDay + " de";
        
    var months = [
        "Enero", "Febrero", "Marzo",
        "Abril", "Mayo", "Junio", "Julio",
        "Agosto", "Septiembre", "Octubre",
        "Noviembre", "Diciembre"
      ];
        pMonth.textContent = months[month];
        pYear.textContent = year;
        
        if(hour>=12){
            hour = hour - 12;
            ampm = 'PM';
        }
        else{
            ampm = 'AM';
        }
        if(hour == 0){
            hour = 12;
        }
        pHours.textContent = hour+":";
        
        if(minutes<10){
           minutes = "0" + minutes;
        }
        pMinutes.textContent = minutes;
        pAMPM.textContent = ampm;
    };
    
    refreshHour();
}());



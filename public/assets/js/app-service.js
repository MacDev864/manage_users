const service = {
	dayShortName:function(number){
		var name = [];
		name[0] = 'อา';
		name[1] = 'จ.';
		name[2] = 'อ.';
		name[3] = 'พ.';
		name[4] = 'พฤ.';
		name[5] = 'ศ.';
		name[6] = 'ส.';

		return name[number];
	},
	number:function(number){
		const formatter = new Intl.NumberFormat('en-US', {
			//style: 'currency',
			currency: 'USD',
			minimumFractionDigits: 2,
			maximumFractionDigits: 2
		})
		return formatter.format(number)
	},
	conNum:function(num){
		return String(num).replaceAll(",","") || null;
		let newNum = ''

		if (num != null) {    
			if (num.includes(',') == true) {
				newNum = num.split(',').join('')
			}
		}
		return newNum
	},
	conDate:function(date){
		let newDate = '';
		if (date != null) {    
			if (date.includes('-') == true) {
				newDate = date.split('-').reverse().join('/')
			}else{
				newDate = date.split('/').reverse().join('-')
			}
		}
		return newDate
	},
	dateOnly:function(date){
		let newDate = '';
		if (date != null) {  
			var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

			if (month.length < 2) 
				month = '0' + month;
			if (day.length < 2) 
				day = '0' + day;

			newDate = [day, month, year].join('/')
		}
		return newDate;
	},
	timeFormat:function(time){
		let timeSet = ""
		const regexExp = /^(\d{2}:\d{2})$/
		//console.log((regexExp.test(time)))
		if (regexExp.test(time) == true) {
			timeSet = time
		}
		return timeSet
	},
	/*
	timeMinute:function(minute){
		let minuteArr = []
		let minuteText
		if(minute != null){
			minuteArr = minute.split(".")
			minuteText = minuteArr[0]
		}
		return minuteText
	},
	*/
	timeMinute:function(time){
		let secondArr = []
		let minuteArr = []
		let minuteText
		if(time != null){
			secondArr = time.split(".")
			minuteArr = secondArr[0].split(":")
			minuteText = minuteArr[0]+':'+minuteArr[1]
		}
		return minuteText
	},
	dateDiff:function(date1, date2){
		dt1 = new Date(date1);
		dt2 = new Date(date2);
		return parseInt(Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24))+parseInt(1));
	},
	calPercent:function(num1, num2){
		let value = num2 - num1
		let Total
		let sumTotal = ``
		//150-100 = 50 , 100-150 = -50

		const formatter = new Intl.NumberFormat('en-US', {
			//style: 'currency',
			currency: 'USD',
			minimumFractionDigits: 2,
			maximumFractionDigits: 2
		})

		if(value >= 0){
			Total = ((parseInt(num2) - parseInt(num1)) / parseInt(num1) ) * parseInt(100)
			sumTotal += `<i class="fas fa-angle-double-up text-success"></i> ${formatter.format(Total)}%`
		}else{
			Total = ((parseInt(num2) - parseInt(num1)) / parseInt(num2) ) * parseInt(100)
			sumTotal += `<i class="fas fa-angle-double-down text-danger"></i> ${formatter.format(Total).replace('-','')}%`
		}
		return sumTotal
	},
	socialInsurance:function(id){
		let string = ""
		switch(id) {
		  case "1":
			  string = "ไม่นำส่งประกันสังคม"
			break;
		  case "2":
			  string = "คิดตามค่าตั้งต้นในระบบ"  
			break;
		  case "3":
			  string = "คิดตามฐานเงินเดือน"  
			break;
		  case "4":
			  string = "คิดตามมาตรา 39"  
			break;
		}
		return string
	},
	payType:function(id){
		let string = ""
		switch(id) {
		  case "1":
			  string = "ผ่านธนาคาร"
			break;
		  case "2":
			  string = "เงินสด"  
			break;
		}
		return string
	},
	payTerm:function(id){
		let string = ""
		switch(id) {
		  case "1":
			  string = "เดือนละ 1 ครั้ง"
			break;
		  case "2":
			  string = "เดือนละ 2 ครั้ง"  
			break;
		}
		return string
	},
	taxCalc:function(id){
		let string = ""
		switch(id) {
		  case "1":
			  string = "ไม่คิดภาษี"
			break;
		  case "2":
			  string = "คิดภาษี ภงด.1 ใหม่ทุกเดือน"  
			break;
		  case "3":
			  string = "คิดภาษี ภงด.1 คงที่ทุกเดือน"  
			break;
		  case "4":
			  string = "คิดภาษี ภงด.1 เป็นเปอร์เซ็นของรายได้"  
			break;
		  case "5":
			  string = "คิดภาษี ภงด.3 รวมรายได้"  
			break;
		  case "6":
			  string = "คิดภาษี ภงด.3 ไม่รวมรายได้"  
			break;
		}
		return string
	},
	empLevel:function(id){
		let string = ""
		switch(id) {
		  case "3":
			  string = "หัวหน้า"
			break;
		  case "4":
			  string = "พนักงาน"  
			break;
		}
		return string
	},
	empGroup:function(id){
		let string = ""
		switch(id) {
		  case "1":
			  string = "พนักงานประจำ"
			break;
		  case "2":
			  string = "ทดลองงาน"  
			break;
		}
		return string
	},
	empType:function(id){
		let string = ""
		switch(id) {
		  case "1":
			  string = "พนักงานรายเดือน"
			break;
		  case "2":
			  string = "พนักงานรายวัน"  
			break;
		}
		return string
	},
	religion:function(text){
		let string = ""
		switch(text) {
		  case "Buddhism":
			  string = "พุทธ"
			break;
		  case "Christianity":
			  string = "คริสต์"  
			break;
		  case "Islam":
			  string = "อิสลาม"
			break;
		  case "Confucianism":
			  string = "ขงจื๊อ"
			break;
		  case "Sikhism":
			  string = "ซิกข์"
			break;
		  case "Baha'i Faith":
			  string = "บาไฮ"
			break;
		  case "Judaism":
			  string = "ยูดาห์"
			break;
		  case "Shinto":
			  string = "ลัทธิชินโต"
			break;
		  case "Hinduism":
			  string = "ฮินดู"
			break;
		  case "Jainism":
			  string = "เชน"
			break;
		  case "Taoism":
			  string = "เต๋า"
			break;
		  case "Non-religious":
			  string = "ไม่มีศาสนา"
			break;
		}
		return string
	},
	military:function(text){
		let string = ""
		switch(text) {
		  case "Pass":
			  string = "ผ่านการเกณฑ์ทหาร"
			break;
		  case "Exempted":
			  string = "ได้รับการยกเว้น / จบหลักสูตรรักษาดินแดน (รด.)"  
			break;
		  case "None":
			  string = "ยังไม่ผ่านการเกณฑ์ทหาร"
			break;
		}
		return string
	},
	married:function(text){
		let string = ""
		switch(text) {
		  case "S":
			  string = "โสด"
			break;
		  case "M":
			  string = "สมรส"  
			break;
		  case "W":
			  string = "หม้าย"
			break;
		}
		return string
	},
	monthTh:function(text){
		let string = ""
		switch(text) {
		  	case "1":
			  string = "มกราคม (January)"
			break;
		  	case "2":
			  string = "กุมภาพันธ์ (February)"  
			break;
		  	case "3":
			  string = "มีนาคม (March)"
			break;
			case "4":
			string = "เมษายน (April)"
		  	break;
			case "5":
			  string = "พฤษภาคม (May)"
			break;
			case "6":
			  string = "มิถุนายน (June)"
			break;
			case "7":
			  string = "กรกฎาคม (July)"
			break;
			case "8":
			  string = "สิงหาคม (August)"
			break;
			case "9":
			  string = "กันยายน (September)"
			break;
			case "10":
			  string = "ตุลาคม (October)"
			break;
			case "11":
			  string = "พฤศจิกายน (November)"
			break;
			case "12":
			  string = "ธันวาคม (December)"
			break;
		}
		return string
	}
}

/*
|---------------------------------------------------|
|					input 						|
|---------------------------------------------------|
*/
$('input.number').keyup(function(event) {
	$(this).val(function(index, value) {
	  return value
		.replace(/\D/g, "")
		.replace(/([0-9])([0-9]{2})$/, '$1.$2')
		.replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
	});
});
$('.parseTime').on('blur', function (event) {
    service.timeFormat($(this).val()) == ""? $(this).val('') : $(this).val(service.timeFormat($(this).val()))
});
/*
$('.parseDate').on('blur', function (event) {
    event.preventDefault();
    const regexExp = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/
    if (!regexExp.test($(this).val())) {
      $(this).val('')
    }
});
*/
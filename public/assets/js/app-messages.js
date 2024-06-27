// const T_SUCCESS = {
//   "1":'บันทึกข้อมูลสำเร็จ',
// }

// const T_ERROR = {
//   "1":'ระบบขัดข้อง กรุณาลองใหม่อีกครั้ง',
// }
// /*
// APP_TOAST.success()
// APP_TOAST.delete()
// APP_TOAST.error()
// APP_TOAST.editfalse()
// */
// var APP_TOAST = {
// 	success:function(msg = 'บันทึกข้อมูลสำเร็จ'){
// 		Snackbar.show({
// 			text: msg,
// 			actionTextColor: '#000',
// 			backgroundColor: '#8dbf42',
// 			pos: 'top-right'
// 		});
// 	},
// 	edit:function(msg = 'แก้ไขข้อมูลสำเร็จ'){
// 		Snackbar.show({
// 			text: msg,
// 			actionTextColor: '#000',
// 			backgroundColor: '#8dbf42',
// 			pos: 'top-right'
// 		});
// 	},
// 	editfalse:function(msg = 'กรุณา "แก้ไขข้อมูล" ก่อนทำการบันทึก'){
// 		Snackbar.show({
// 			text: msg,
// 			actionTextColor: '#000',
// 			backgroundColor: '#e2a03f',
// 			pos: 'top-right'
// 		});
// 	},
// 	delete:function(msg = 'ลบข้อมุลสำเร็จ'){
// 		Snackbar.show({
// 			text: msg,
// 			actionTextColor: '#000',
// 			backgroundColor: '#e7515a',
// 			pos: 'top-right'
// 		});
// 	},
// 	duplicate:function(msg){
// 		Snackbar.show({
// 			text: msg,
// 			actionTextColor: '#fff',
// 			backgroundColor: '#e7515a',
// 			pos: 'top-right'
// 		});
// 	},
// 	error:function(msg){
// 		Snackbar.show({
// 			text: msg,
// 			actionTextColor: '#fff',
// 			backgroundColor: '#e7515a',
// 			pos: 'top-right'
// 		});
// 	},
// } 


// var msg = function(data){
// 	console.log(data)
// }

toastr.options = {
	positionClass: "toast-top-right",
	timeOut: 3000,
	progressBar: true,
	showMethod: "slideDown",
	hideMethod: "slideUp",
	showDuration: 200,
	hideDuration: 200
};
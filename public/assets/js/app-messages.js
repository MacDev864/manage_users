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
  closeButton: true,
  debug: false,
  newestOnTop: false,
  progressBar: false,
  positionClass: 'toast-top-right',
  preventDuplicates: false,
  showDuration: '1000',
  hideDuration: '1000',
  timeOut: '5000',
  extendedTimeOut: '1000',
  showEasing: 'swing',
  hideEasing: 'linear',
  showMethod: 'fadeIn',
  hideMethod: 'fadeOut'
};

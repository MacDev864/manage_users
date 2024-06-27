const LOADER_BODY = `
<div class="text-center">
	<div class="spinner-border" style="width: 3rem; height: 3rem;" role="status"></div>
	<div class="mt-2">กำลังโหลดข้อมูล...</div>
</div>
`
const BTN_TEXT_PROCESSING =`
<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>กำลังบันทึกข้อมูล
`

const BTN_TEXT_NOMAL =`
บันทึก
`
/*
APP_LOADING.showLoading()
APP_LOADING_DTB.showLoading(7)
*/

const APP_LOADING = {
	showLoading:function(){
		return LOADER_BODY
	}
}

const BTN_LOADING = {
	show_btn:function(){
		return BTN_TEXT_PROCESSING
	}
}
const BTN_NOMAL = {
	show_btn:function(){
		return BTN_TEXT_NOMAL
	}
}

const APP_TB_ROW_EMPTY = {
	showAlert:function(colspan_value){
		const ROW_DATA_IS_EMPTY = `
			<tr>
				<td class="text-center" colspan="${colspan_value}">
					ไม่พบข้อมูล
				</td>
			</tr>
		`
		return ROW_DATA_IS_EMPTY
	}
}

const APP_LOADING_DTB = {
	showLoading:function(value){
		const content =`
		<tr>
			<td colspan="${value}">
				${LOADER_BODY}
			</td>
		</tr>
		`
		return content
	}
}
const APP_LOADING_LI = {
	showLoading:function(){
		const content =`
		<li class="text-center">
			<div>
				${LOADER_BODY}
			</div>
		</li>
		`
		return content
	}
}
/*
|---------------------------------------------------|
|					scrollTop 						|
|---------------------------------------------------|
*/
function scrollToDIV(container_string,div_string){
	var container = null
	var scrollTo = null
	if(container_string.match(/#/g)){
		container = $(container_string)
	}else{
		container = $('#'+container_string)
	}

	if(div_string.match(/#/g)){
		scrollTo = $(div_string)
	}else{
		scrollTo = $('#'+div_string)
	}

	let pointer = scrollTo.offset().top - container.offset().top + container.scrollTop()
	container.animate({
		scrollTop: pointer
	}, 500);

}

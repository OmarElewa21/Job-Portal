(()=>{"use strict";$(document).on("click",".delete-btn",(function(e){var t=$(e.currentTarget).data("id");swal({title:Lang.get("messages.common.delete")+" !",text:Lang.get("messages.common.are_you_sure_want_to_delete")+'"'+Lang.get("messages.candidate.reported_candidate")+'" ?',type:"warning",showCancelButton:!0,closeOnConfirm:!1,showLoaderOnConfirm:!0,confirmButtonColor:"#6777ef",cancelButtonColor:"#d33",cancelButtonText:Lang.get("messages.common.no"),confirmButtonText:Lang.get("messages.common.yes")},(function(){window.livewire.emit("deleteReportedCandidate",t)}))})),document.addEventListener("delete",(function(){swal({title:Lang.get("messages.common.deleted")+" !",text:Lang.get("messages.candidate.reported_candidate")+Lang.get("messages.common.has_been_deleted"),type:"success",confirmButtonColor:"#6777ef",timer:2e3})})),$(document).on("click",".view-note",(function(e){if(!ajaxCallIsRunning){ajaxCallInProgress();var t=$(e.currentTarget).data("id");$.ajax({url:reportedCandidatesUrl+"/"+t,type:"GET",success:function(e){e.success&&($("#showNote,#showName,#showReportedBy,#showReportedOn,#showImage").html(""),(isEmpty(e.data.note)?$("#showNote").append("N/A"):$("#showNote").append(e.data.note))&&$("#showName").append(e.data.candidate.user.first_name),$("#showReportedBy").append(e.data.user.first_name),$("#showReportedOn").append(e.data.date),$("#showImage").append('<img src="'+e.data.candidate.candidate_url+'" class="img-responsive users-avatar-img employee-img mr-2" />'),$("#showModal").appendTo("body").modal("show"),ajaxCallCompleted())},error:function(e){displayErrorMessage(e.responseJSON.message)}})}})),$(document).ready((function(){$("#filter_by_reported_date").select2()})),$(document).ready((function(){$("#filter_by_reported_date").on("change",(function(e){var t=$("#filter_by_reported_date").select2("val");window.livewire.emit("changeFilter","filterByReportedDate",t)}))}))})();
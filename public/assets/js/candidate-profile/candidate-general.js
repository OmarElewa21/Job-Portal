(()=>{"use strict";$(document).ready((function(){function e(){"0"==$("input[name='immediate_available']:checked").val()?$(".available-at").show():$(".available-at").hide()}$("#birthDate").datetimepicker(DatetimepickerDefaults({format:"YYYY-MM-DD",useCurrent:!0,sideBySide:!0,maxDate:new Date})),$("#availableAt").datetimepicker(DatetimepickerDefaults({format:"YYYY-MM-DD",useCurrent:!1,sideBySide:!0,minDate:new Date})),$("#skillId, #languageId, #salaryCurrencyId,#countryId,#stateId,#cityId").select2({width:"100%"}),setTimeout((function(){$("input[type=radio][name=immediate_available]").trigger("change")}),300),$("#countryId").on("change",(function(){$.ajax({url:companyStateUrl,type:"get",dataType:"json",data:{postal:$(this).val()},success:function(e){$("#stateId").empty(),$("#stateId").append($('<option value=""></option>').text("Select State")),$.each(e.data,(function(e,t){$("#stateId").append($("<option></option>").attr("value",e).text(t))})),isEdit&&stateId&&$("#stateId").val(stateId).trigger("change")}})})),$("#stateId").on("change",(function(){$.ajax({url:companyCityUrl,type:"get",dataType:"json",data:{state:$(this).val(),country:$("#countryId").val()},success:function(e){$("#cityId").empty(),$.each(e.data,(function(e,t){$("#cityId").append($("<option ></option>").attr("value",e).text(t))})),isEdit&&cityId&&$("#cityId").val(cityId).trigger("change")}})})),isEdit&countryId&&$("#countryId").val(countryId).trigger("change"),$(document).on("change","#profile",(function(){isValidFile($(this),"#validationErrors")?(displayPhoto(this,"#profilePreview"),$(".btnSave").prop("disabled",!1)):$(".btnSave").prop("disabled",!0)})),$("input[type=radio][name=immediate_available]").change((function(){1==$("input[name='immediate_available']:checked").val()?$(".available-at").hide():$(".available-at").show()})),$("#available").click((function(){e()})),$("#not_available").click((function(){e()}))})),$(document).on("keyup","#facebookUrl",(function(){this.value=this.value.toLowerCase()})),$(document).on("keyup","#twitterUrl",(function(){this.value=this.value.toLowerCase()})),$(document).on("keyup","#linkedInUrl",(function(){this.value=this.value.toLowerCase()})),$(document).on("keyup","#googlePlusUrl",(function(){this.value=this.value.toLowerCase()})),$(document).on("keyup","#pinterestUrl",(function(){this.value=this.value.toLowerCase()})),$(document).on("submit","#candidateProfileUpdate",(function(e){if(e.preventDefault(),""!==$("#error-msg").text())return $("#phoneNumber").focus(),!1;$("#candidateProfileUpdate").find("input:text:visible:first").focus();var t=$("#facebookUrl").val(),a=$("#twitterUrl").val(),i=$("#linkedInUrl").val(),n=$("#googlePlusUrl").val(),l=$("#pinterestUrl").val(),o=new RegExp(/^(https?:\/\/)?((m{1}\.)?)?((w{3}\.)?)facebook.[a-z]{2,3}\/?.*/i),r=new RegExp(/^(https?:\/\/)?((m{1}\.)?)?((w{3}\.)?)twitter\.[a-z]{2,3}\/?.*/i),d=new RegExp(/^(https?:\/\/)?((w{3}\.)?)?(plus\.)?(google\.[a-z]{2,3})\/?(([a-zA-Z 0-9._])?).*/i),s=new RegExp(/^(https?:\/\/)?((w{3}\.)?)linkedin\.[a-z]{2,3}\/?.*/i),u=new RegExp(/^(https?:\/\/)?((w{3}\.)?)pinterest\.[a-z]{2,3}\/?.*/i);return urlValidation(t,o),urlValidation(a,r),urlValidation(i,s),urlValidation(n,d),urlValidation(l,u),urlValidation(t,o)?urlValidation(a,r)?urlValidation(n,d)?urlValidation(i,s)?urlValidation(l,u)?($("#candidateProfileUpdate")[0].submit(),!0):(displayErrorMessage("Please enter a valid Pinterest Url"),!1):(displayErrorMessage("Please enter a valid Linkedin Url"),!1):(displayErrorMessage("Please enter a valid Google Plus Url"),!1):(displayErrorMessage("Please enter a valid Twitter Url"),!1):(displayErrorMessage("Please enter a valid Facebook Url"),!1)}))})();
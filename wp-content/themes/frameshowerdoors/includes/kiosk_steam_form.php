<!-- Note :
   - You can modify the font style and form style to suit your website.
   - Code lines with comments “Do not remove this code”  are required for the form to work properly, make sure that you do not remove these lines of code.
   - The Mandatory check script can modified as to suit your business needs.
   - It is important that you test the modified form before going live.-->
<div id='crmWebToEntityForm' style='width:400px;margin:auto;>
    <META HTTP-EQUIV ='content-type' CONTENT='text/html;charset=UTF-8'>
    <form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads1429722000019561373 method='POST' target='_top' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory()' accept-charset='UTF-8'>

        <!-- Do not remove this code. -->
        <input type='text' style='display:none;' name='xnQsjsdp' value='f6675da4f5b64b7c54aeb859879a87ea594e8fefd20d5f521a0288b1f64c3ca9'/>
        <input type='hidden' name='zc_gad' id='zc_gad' value=''/>
        <input type='text' style='display:none;' name='xmIwtLD' value='9d3bc3a95b188bcc05de1fdd4794542a194834cb6b00a4f05671b24c8825670f'/>
        <input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

        <!--input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;fdkiosk&#x2f;kiosk' /-->

        <input type='text' style='display:none;' name='returnURL' value='https&#x3a;&#x2f;&#x2f;www.framelessshowerdoors.com&#x2f;main-thank-you/?FDLocation=<?php echo $_GET['FDLocation'];?>&56_temp=<?php echo $_GET['56_temp'];?>' />

        <!-- Do not remove this code. -->
        <style>
            tr , td {
                padding:6px;
                border-spacing:0px;
                border-width:0px;
            }
        </style>
        <table style='width:400px;color:black'>

            <tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>First Name<span style='color:red;'>*</span></td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='40' name='First Name' /></td></tr>

            <tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>Last Name<span style='color:red;'>*</span></td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='80' name='Last Name' /></td></tr>

            <tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>Email<span style='color:red;'>*</span></td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='100' name='Email' /></td></tr>

            <tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>Phone<span style='color:red;'>*</span></td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='30' name='Phone' /></td></tr>

            <!--tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>State</td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='30' name='State' /></td></tr-->

            <!--tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>Zip Code</td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='30' name='Zip Code' /></td></tr-->

            <tr><td  style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:200px;'>message</td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='255' name='LEADCF1' /></td></tr>

            <tr style='display:none;' ><td style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:50%'>F&amp;DLocation</td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='250' name='LEADCF12' value='<?php echo $_GET['FDLocation'];?>'></input></td></tr>

            <tr style='display:none;' ><td style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:50%'>doortype</td><td style='width:250px;'>
                    <select style='width:250px;' name='LEADCF6'>
                        <option selected value="Custom&#x20;Steam">Custom Steam</option>
                    </select></td></tr>

            <tr style='display:none;' ><td style='nowrap:nowrap;text-align:left;font-size:12px;font-family:Arial;width:50%'>IPAddress</td><td style='width:250px;' ><input type='text' style='width:250px;'  maxlength='255' name='LEADCF43' value='true'></input></td></tr>

            <tr><td colspan='2' style='text-align:center; padding-top:15px;'>
                    <input style='font-size:12px;color:#131307' type='submit' value='Submit' />
                    <input type='reset' style='font-size:12px;color:#131307' value='Reset' />
                </td>
            </tr>
        </table>
        <script>
            var mndFileds=new Array('First Name','Last Name','Email','Phone');
            var fldLangVal=new Array('First Name','Last Name','Email','Phone');
            var name='';
            var email='';

            function checkMandatory() {
                for(i=0;i<mndFileds.length;i++) {
                    var fieldObj=document.forms['WebToLeads1429722000019561373'][mndFileds[i]];
                    if(fieldObj) {
                        if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
                            if(fieldObj.type =='file')
                            {
                                alert('Please select a file to upload.');
                                fieldObj.focus();
                                return false;
                            }
                            alert(fldLangVal[i] +' cannot be empty.');
                            fieldObj.focus();
                            return false;
                        }  else if(fieldObj.nodeName=='SELECT') {
                            if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
                                alert(fldLangVal[i] +' cannot be none.');
                                fieldObj.focus();
                                return false;
                            }
                        } else if(fieldObj.type =='checkbox'){
                            if(fieldObj.checked == false){
                                alert('Please accept  '+fldLangVal[i]);
                                fieldObj.focus();
                                return false;
                            }
                        }
                        try {
                            if(fieldObj.name == 'Last Name') {
                                name = fieldObj.value;
                            }
                        } catch (e) {}
                    }
                }
            }

        </script>
    </form>
</div>
        <br /><br />
    <form method="post" action="">
          <div class="container clearfix">
         <div class="two-thirds column">
          <h2 class="title">Character Name<span class="line"></span></h2>
        <div id="panelDefault" style="width:500px;">
            <p></p>
            <table cellpadding="4" cellspacing="0" style="width: 425px">
            <tr>
                <td align="center" colspan="2">{SERVER_MESSAGE}</td>
            </tr>
            <tr>
                <td class="style2">
                    Current Email:
                </td>
                <td class="greenText">
                    <strong>
                        <span id="lblEmail">{UDATA_EMAIL}</span>
                    </strong>
                </td>
            </tr>
            <tr>
                <td class="style2">
                    New Email:
                </td>
                <td>
                    <input name="txtNewEmail" type="text" id="txtNewEmail" class="stdInput" style="width:176px;" />
                </td>
            </tr>
            <tr>
                <td class="style2">
                    Retype New Email:
                </td>
                <td>
                    <input name="txtRetypeEmail" type="text" id="txtRetypeEmail" class="stdInput" style="width:176px;" />
                </td>
            </tr>
            <tr>
                <td class="style2"></td>
                <td>
                    <input type="submit" name="btnSubmit" value="Submit" id="btnSubmit" />
                </td>
            </tr>
            </table>
        </div>
    </form>
	</div>
	
	<!-- Start Sidebar Widgets -->
       <div class="five columns bottom">
          <h2 class="title">Character Information<span class="line"></span></h2>
       <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="280" height="211"><param name="movie" value="/gamefiles/face.swf?ver=2"><param name="quality" value="high"><param name="wmode" value="transparent"><param name="flashvars" value="&intAccessLevel=1&intColorHair=3355443&intColorSkin=16764057&intColorEye=16711680&intColorTrim=16764006&intColorBase=3355443&intColorAccessory=16763955&ia1=0&strGender=M&strHairFile=hair/m/default.swf&strHairName=Default&strName=BLIND_RHYME&intLevel=50&strGuildName=YOUTUBEsvdh&strClassName=Vindicator of They&strClassFile=magicalgirlcc.swf&strClassLink=MagicalGirlCC&strArmorName=Amazing Weeaboo Mariner&strWeaponFile=none&strWeaponLink=none&strWeaponType=none&strWeaponName=&strCapeFile=items/capes/guardianshadowcape.swf&strCapeLink=GuardianShadowCape&strCapeName=Guardian Shadow&strHelmFile=items/helms/SnowSpikes.swf&strHelmLink=SnowSpikes&strHelmName=Stalker's Spikes&strPetFile=items/pets/daimyobattle.swf&strPetLink=DaimyoBattle&strPetName=Daimyo&bgindex=0"><embed src="/gamefiles/face.swf?ver=2" width="280" height="211" quality="high" wmode="transparent" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" flashvars="&intAccessLevel=1&intColorHair=3355443&intColorSkin=16764057&intColorEye=16711680&intColorTrim=16764006&intColorBase=3355443&intColorAccessory=16763955&ia1=0&strGender=M&strHairFile=hair/m/default.swf&strHairName=Default&strName=BLIND_RHYME&intLevel=50&strGuildName=YOUTUBEsvdh&strClassName=Vindicator of They&strClassFile=magicalgirlcc.swf&strClassLink=MagicalGirlCC&strArmorName=Amazing Weeaboo Mariner&strWeaponFile=none&strWeaponLink=none&strWeaponType=none&strWeaponName=&strCapeFile=items/capes/guardianshadowcape.swf&strCapeLink=GuardianShadowCape&strCapeName=Guardian Shadow&strHelmFile=items/helms/SnowSpikes.swf&strHelmLink=SnowSpikes&strHelmName=Stalker's Spikes&strPetFile=items/pets/daimyobattle.swf&strPetLink=DaimyoBattle&strPetName=Daimyo&bgindex=0"></object>
          <ul class="square-list"><br />
              <li class="bg"> Account Name: <strong>{UDATA_NAME}</strong></li><br />
              <li class="bg"> Email Status: <span id="lblStatus" style="{UDATA_EMAIL_STATUS_COLOR} font-weight: 700">{UDATA_EMAIL_STATUS}</span></li><br />
              <li class="bg"> Upgrade Expire: <strong>{UDATA_UPGEXPIRE}</strong></li><br />
              <li class="bg"> Account Position: <span id="lbllastAccessed" style="{UDATA_ACCESS_STATUS_COLOR} font-weight: 700">{UDATA_ACCESS}</span></li><br />
              <li class="bg"> Date Created: <strong>{UDATA_DATECREATED}</strong></li><br />
         </ul><br />
    <!-- End -->
   </div><!-- End Sidebar Widgets -->
</div>
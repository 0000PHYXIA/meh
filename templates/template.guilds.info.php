        <br /><br />
            {SERVER_MESSAGE}
            <span>
                {SERVER_GUILD_NAME}<br />
            </span>&nbsp;<br>{SERVER_GUILD_DESCRIPTION}<br />
            <table id="Table1" cellspacing="0" cellpadding="4">
            <tr>
                <td></td>
            </tr>
            <tr>
                <td width="50%">
                    Guild Founder:
                </td>
                <td align="left" width="50%">
                    <span id="lblFounder"><a href="playme/profile.php?u={SERVER_GUILD_FOUNDER}">{SERVER_GUILD_FOUNDER}</span>
                </td>
            </tr>
            <tr>
                <td>
                    Date Created:
                </td>
                <td align="left">
                    <span id="lblCreated">{SERVER_GUILD_DATECREATED}</span>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    Total Members:
                </td>
                <td align="left">
                    <span id="lblMembers">{SERVER_GUILD_TOTALMEMBERS}</span>
                </td>
            </tr>
            <tr>
                <td>
                    Pending Members:
                </td>
                <td align="left">
                    <span id="lblPending">{SERVER_GUILD_TOTALPENDINGMEMBERS}</span>
                </td>
            </tr>
            <tr>
                <td valign="top">
                </td>
                <td align="left">
                 </td>
            </tr>
            </table>

            <table id="Table2" cellspacing="0" cellpadding="4">
                <tr>
                    <td width="40%" valign="top">
                        <p><h3>Members List:</h3>
                        {SERVER_MEMBER_LIST}</p>
                    </td>
					
                    <td align="left" width="60%" valign="top">
                        <p><h3>Pending Members:</h3>
                        {SERVER_PENDING_LIST}</p>
                    </td>
                </tr>
            </table>

            {SERVER_GUILD_OPTIONSTITLE}
            {SERVER_GUILD_OPTIONS}

            <center><div class="fb-comments" data-href="{UDATA_CURRENTURL}" data-num-posts="2" data-width="500" data-colorscheme="light"></div></center>	
        <br /><br />
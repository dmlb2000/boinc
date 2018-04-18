<?php
// This file is part of BOINC.
// https://boinc.berkeley.edu
// Copyright (C) 2018 University of California
//
// BOINC is free software; you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License
// as published by the Free Software Foundation,
// either version 3 of the License, or (at your option) any later version.
//
// BOINC is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with BOINC.  If not, see <https://www.gnu.org/licenses/>.

require_once("../inc/util.inc");
require_once("../inc/account.inc");
require_once("../inc/delete_account.inc");
require_once("../inc/token.inc");

$userid = get_int("id");
$token = get_str("token");

check_delete_account_token($userid, $token);

page_head(tra("Delete Account"));

echo "<p>".tra("Thank you for verifying ownership of your account.")."</p>"
     ."<p>".tra("You can now delete your account by entering in your password below and clicking the \"Delete Account\" button.")."</p>"
     ."<p>".tra("As a reminder, your account <b>cannot be recovered</b> once you delete it.")."</p>"
     ."<br/>";

form_start(secure_url_base()."delete_account_confirm_action.php", "post");
form_input_hidden("token",$token);
form_input_hidden("id",$userid);
form_input_text(tra("Password"), "passwd", "", "password",'id="passwd"',passwd_visible_checkbox("passwd"));
form_submit(tra("Delete Account"));
form_end();

page_tail();
?>
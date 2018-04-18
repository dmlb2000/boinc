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
require_once("../inc/token.inc");
require_once("../inc/boinc_db.inc");
require_once("../inc/user_util.inc");
require_once("../inc/delete_account.inc");

//Make sure the token is still valid
$userid = post_int("id");
$token = post_str("token");

check_delete_account_token($userid, $token);

//Verify password
$user = BoincUser::lookup_id($userid);
$passwd = post_str("passwd");

check_passwd_ui($user, $passwd);

//do account delete

page_head(tra("Account Deleted"));

echo "<p>".tra("Your account has been deleted.  If you want to contribute to ".PROJECT." in the future you will need to create a new account.")."</p>";

page_tail();
?>
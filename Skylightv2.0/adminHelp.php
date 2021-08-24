<?php
// Admin Help Page
// Max Zaremba
// Last Update: April 29, 2021

session_start();
include_once 'header.php';
?>

<div id="pendingApps">
    <h2>Reviewing Pending Applications</h2>
    <p>If you would like to see the list of pending app submissions, click "Pending Applications".</p>
    <p>To cycle through the pending applications, click one of the arrows.</p>
    <p>To approve the current application, click "Approve".</p>
    <p>To reject the current application, click "Reject".</p>
    <p>The application that is next in the database will automatically appear.</p>
</div>

<div id="commentModeration">
    <h2>Moderating Comment Sections</h2>
    <p>As a Skylight Admin, you have the ability to edit or delete the comments of other users.</p>
    <p>The process for editing and deleting comments is identical to the process for normal users.</p>
    <p>If you would like to edit a user comment, navigate to it and click "Edit".</p>
    <p>If you would like to delete a user comment, navigate to it and click "Delete".</p>
</div>
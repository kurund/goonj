<?php

function sendDailyInductionEmails() {
    $today = date('Y-m-d');
    $params = [
        'activity_type_id' => 57, // Replace with the actual ID of your custom activity type
        'activity_date_time' => ['LIKE' => "$today%"],
        'is_current_revision' => 1,
    ];

    $activities = civicrm_api3('Activity', 'get', $params);

    foreach ($activities['values'] as $activity) {
        $contactID = $activity['assignee_contact_id'];
        $activitySubject = $activity['subject'];

        // Retrieve contact details
        $contact = civicrm_api3('Contact', 'get', [
            'id' => $contactID,
            'return' => ['display_name', 'email'],
        ]);

        $email = $contact['values'][$contactID]['email'];
        $name = $contact['values'][$contactID]['display_name'];

        // Send email
        $params = [
            'from' => 'no-reply@yourdomain.com',
            'toName' => $name,
            'toEmail' => $email,
            'subject' => "Induction Activity Reminder: $activitySubject",
            'text' => "Dear $name,\n\nThis is a reminder for your induction activity scheduled for today.\n\nBest Regards,\nYour Team",
        ];

        $mailing = CRM_Utils_Mail::send($params);
    }
}

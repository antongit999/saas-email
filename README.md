saas-email
==========

Manage email notification preferences and send system emails.


===========



Description

We need to send email notifications and summaries to users. We want to allow users to control what emails are sent to them.

System: The system should automatically generate emails based on events or periodic summaries.
Admin: Administrators should be able to generate fully branded emails manually.
Users: Users need to be able to control what emails are sent to them.

NOTE: This is a feature we will need to add to Empire and keep as part of the core platform, it may be wise to deploy as a bundle, but I am open for any form with the understanding we will be deploying to other projects in the future.


1. Purpose of Message_Template
This is to be the shell. I can see there being different shells based on the target e.g. Authors may get messages with a different shell than Brands. These would be the technically most simple, it just parses in the body content, the branding will always be from SurroundsMe until we take on White Label reseller (tie into Agencies) then it could have different branding based on the agency that the brand is assigned to.

2. Message Groups:
(Please see screenshot http://pm.e.mp/issues/755) The point of this was essentially to group tighter types of messages and hide groups of message types that would never be applicable to a certain group. E.g. if you are a normal user in your opt-out screen (illustrated in the attachment), you wouldn't want to have access to enable or disable Brand or Author related notifications as the system would never send those to you. So this message group section is really more a way to organize the opt-in/opt-out capabilities (the permission to control if the message should be sent or not would be in its child the message_type). The thought would be if the group id = 0, then yes, show to all users.

3. Message Types:
This is the real capability here, these are organized by groups, the parent group determines if you can see these settings to opt in/out. What this does is defines an instance for every email being sent from the system. This will allow us to control what every email looks like (which template it uses), what the language/verbiage is in the email e.g. You are receiving this email because [%author_name%] has created a new campaign [%author_campaign_title%] that you should buy. So each message type needs to identify which dictionary objects are applicable to that specific email, the any dictionary objects or tags which are hard-coded in the logic e.g. [%author_name%] would be identified in an array in a field and are displayed "You can use these tags in this message_type" 
(we may wish to also add in a "language" field where we can specify US_en, DE_de, etc. so that if we go international it will be very easy to localize.





Data Model
There are two types of messages, system generated and manual admin generated, both methods will be assigned a type category. Types are organized into groups. Groups may or may not be tied to a user (system or brand) group. e.g. Subscription Alerts would be tied to the Subscription Group, so if you are not a billing point of contact you wont see the subscription alerts group to opt in-out of. Need the ability to create custom branded HTML templates, does not have to be as complex as MailChimp uses with their visual editor, but does need to allow the editing of HTML and uploading images to go into the layout. The end product will be attached: (See attachments)

message_template (This is the HTML design that wraps the message content)
id
title (The name of the template, e.g. Default, or Holiday Style)
text (The HTML of the newsletter) *
message_group (This organizes the message types)
id (autoinc)
user_group_id (is this group specific to a user group?)
title (varchar 255)
text (text)
message_type (This defines the type of messages sent)
id
message_group_id (which group is this message type assigned to)
type (0 = system message, 1 = admin message)
title (default title, eg. "You have a new follower")
template_id (int) (Template ID to use)
template_body (text Only shown if a system message, acts as the body template for the canned system message)
template_objects (Array of identified dictionary objects that will be parsed out of the template_body eg. [subscriber_count] matches code
frequency (int) (send as triggered or collect notifications for weekly summary? 0 = as triggered, 1 = daily, 2 = weekly, 3 = monthly)
message_sent (This is where the administratively sent messages would be stored)
id
message_type_id
title (the subject line)
text
date_sent
CRUD
Admin
/admin/email

/admin/email/template <-- Manage Templates

/admin/email/group <-- Manage Groups

/admin/email/type <-- Manage Types

/admin/email/send <-- Send messages

User
/user/settings/notifications <-- Show checkboxes (see attached) of what is subscribed to

System Notifications
Example message_group groups and message_type's would be:

Brand Activity (Message Group linked to "Brand Manager" System Group)
- Notified when advocate interacts with brand tasks
- Notified when social statistics increase
- Notified of campaign summary

Author Activities (Message Group linked to "Author" System Group)
- Notified when campaign is downloaded.
- Notified when payment is sent
- Notified when campaign is rated
- Notified when campaign is requested
- Notified when message posted to a requested campaign they have participated in
- Notified of new badge issued

Advocate Activities (Message Group linked to "Advocate" System Group)
- Congratulations when making a leaderboard (that was not empty)
- Congratulations when toping the leaderboard (with more than 5)

Subscription Alerts (tied to the Subscription Group)




http://pm.e.mp/attachments/download/237/Message%20Opt%20InOut.png





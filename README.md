hipchat
=======

A simple PHP HipChat client class for version 2 (v2) and for version 1 (v1).

Include it.

Update the variables in the construct.

Make a call using the request method.

The first argument is the resource id, e.g. users/list or room/{room_id}/history.
The second argument is the query string.  Add an array e.g. array('date' => '2014-08-25').
The third argument is a switch for v2, true is v2, false or not specified will default to v1.

Enjoy!

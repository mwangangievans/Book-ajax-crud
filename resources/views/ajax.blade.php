<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax 3 - external APIs</title>
    <style>
        .users {
            background: gray;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            margin-left: auto;
            margin-right: auto;
        }

        .user ul li {
            list-style: none;
        }

        .evans #button {
            background: red;
            margin-top: 50px;
            align-content: center;
            margin-left: 40%;
        }
    </style>
</head>

<body>
    <a href="/"><button class="btn btn-primary">BACK</button></a>

    <div class="evans"> <button id="button">Load Github Users</button>
    </div>
    <br><br>
    <h2>Github users</h2>
    <div id="users"></div>
    <script>
        document.getElementById('button').addEventListener('click', loadUsers);

        //load git hub users

        function loadUsers() {
            var xhr = new XMLHttpRequest();

              xhr.open('Get', 'https://api.github.com/users', true);

            xhr.onload = function() {
                if (this.status == 200) {
                    var users = JSON.parse(this.responseText);
                    // console.log(users);

                    var output = '';
                    for (var i in users) {
                        output +=
                            '<div class = "users">' +
                            '<ul>' +
                            '<img src="' + users[i].avatar_url + '" width = "70" height ="70">' +
                            '<li>ID:' + users[i]._id + '</li>' +
                            '<li>login:' + users[i].login + '</li>' +
                            '<li>followers :' + users[i].followers_url + '</li>' +
                            '<li>followings :' + users[i].following_url + '</li>' +
                            '<li>gists :' + users[i].gists_url + '</li>' +
                            '<li>starred :' + users[i].starred_url + '</li>' +
                            '<li>subscriptions :' + users[i].subscriptions_url + '</li>' +
                            '<li>organizations:' + users[i].organizations_url + '</li>' +
                            '<li>Repositories:' + users[i].repos_url + '</li>' +
                            '<li>Events:' + users[i].events_url + '</li>' +
                            '<li>Received Events:' + users[i].received_events_url + '</li>' +
                            '<li>User Type:' + users[i].type + '</li>' +
                            '<li>Site Admin:' + users[i].site_admin + '</li>' +
                            '</ul>' +
                            '</div>';

                    }
                    document.getElementById('users').innerHTML = output;

                }
            }
            xhr.send();

        }
    </script>
</body>

</html>

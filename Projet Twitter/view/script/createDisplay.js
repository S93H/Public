export function createDisplay(type, data) {
    // console.log('prout');
    // const swichArr = {
    //     "prout": createBody()
    // };
    console.log(type);
    switch (type) {
        case "connectionPage":
            // console.log('yeah baby');
            createConnection();
            break;
        case "registerPage":
            createRegister();
            break;
        case "registerUser":
            createIndex();
            break;
        case "connectionUser":
            createFeed(data);
            break;
        case "searchUser":
            createSearchResults(data);
            break;
        case "userProfile":
            createProfile(data);
            break;
        case "comments":
            createComments(data);
            break;
        default:
            console.log('default prout createDisplau');
    }

    // $('body').html('');

    // $.ajax("./view1.html", {
    //     success: function(response) {
    //         $('body').html(response);
    //         $('#username').text(data.username);
    //         let prout = $('ul > li');
    //         const prutos = [data.dob, data.mail];
    //         let i = 0;
    //         $.each(prout, function(indexInArray, valueOfElement) {
    //             $(this).text(prutos[i]);
    //             i++;
    //         });
    //         // console.log($('ul > li')[0]);
    //         // console.log(data.username);
    //     }
    // });
}

function createComments(data) {
    $(".feed_container").html("");
    const comArea = $("<div></div>").addClass("comArea");
    const textArea = $("<textarea></textarea>").attr('id', 'commentaireFeed');
    textArea.attr('cols', '30');
    textArea.attr('rows', '10');
    const areaBtn = $('<button></button>').attr('id', 'comFeedBtn').text('Poster');
    areaBtn.attr('data-index', data.post['id']);
    comArea.append(textArea, areaBtn);
    const row = $("<div></div>").addClass("row");
    row.addClass("rowFeed");
    const div1 = $("<div></div>").addClass("twelve.columns");
    const div2 = $("<div></div>").addClass("main_container");
    const profilePicLink = $("<a></a>").attr("href", "#");
    const profilePic = $("<img>").attr("src", data.post["profile_picture"]).addClass("img-responsive");
    profilePic.attr("width", "10%");
    profilePic.attr("heigth", "10%");
    profilePicLink.append(profilePic);
    const username = $("<a></a>").attr("href", "#").addClass("main_user").text(data.post["username"]);
    const p = $("<p></p>").text(data.post["content"]);
    div2.append(profilePicLink, username, p);
    row.append(div1, div2);
    $(".feed_container").append(comArea, row);

    $.each(data.comments, function(indexInArray, valueOfElement) {
        const commentBox = $("<div></div>").addClass("comBox");
        const commentRow = $("<div></div>").addClass("com");
        const commentDiv = $("<div></div>").addClass("comUser");
        const profilePic2 = $("<img>").attr("src", valueOfElement["profile_picture"]);
        profilePic2.attr("id", "imgCom");
        const p2 = $("<p></p>").text(valueOfElement["username"]);
        const divCom = $("<div></div>").addClass("leCommentaire").text(valueOfElement['content']);
        commentBox.append(commentRow);
        commentDiv.append(profilePic2, p2);
        commentRow.append(commentDiv, divCom);
        $(".feed_container").append(commentBox);

    });
}

function createProfile(data) {
    $.ajax("view/profile.html", {
        success: function(response) {
            $(".feed_container").html("");
            $(".feed_container").html(response);
            let json1 = JSON.parse(data.json1);
            let json2 = JSON.parse(data.json2);
            if (json1.username !== sessionStorage.getItem("username")) {
                $('.boxProfil').toggle();
            }
            $("#yourFollow").text(json2.followers);
            $("#yourFollowing").text(json2.following);
            $("#pUsername").text(json1.username);
            $("#pLastname").text(json1.lastname);
            $("#pFirstname").text(json1.firstname);
            $("#pDob").text(json1.birthdate);
            $("#pMail").text(json1.mail);
            // console.log(json1);
        }
    });
}

function createFeed(data) {
    $.ajax("view/main.html", {
        success: function(response) {
            $("body").html(response);
            // $("#id_user").text(data[0]["username"]);
            // $(".main_user").text(data[0]["username"]);
            // $(".main_container > p").text(data[0]["content"]);
            $("#id_user").text(sessionStorage.getItem("username"));
            $("#img_user").attr("src", sessionStorage.getItem("profile_pic"));
            $.each(data, function(indexInArray, valueOfElement) {
                // console.log(valueOfElement);
                const row = $("<div></div>").addClass("row");
                row.addClass("rowFeed");
                const div1 = $("<div></div>").addClass("twelve.columns");
                const div2 = $("<div></div>").addClass("main_container");
                const profilePicLink = $("<a></a>").attr("href", "#");
                const profilePic = $("<img>").attr("src", valueOfElement["profile_picture"]).addClass("img-responsive");
                profilePic.attr("width", "10%");
                profilePic.attr("heigth", "10%");
                profilePicLink.append(profilePic);
                const username = $("<a></a>").attr("href", "#").addClass("main_user").text(valueOfElement["username"]);
                username.attr('data-index', valueOfElement['id_user']);
                username.attr('id', "postUsername");
                const p = $("<p></p>").text(valueOfElement["content"]);
                const commentLinkDiv = $("<div></div>").addClass("main_onglets");
                const commentLink = $("<a></a>").attr("href", "#").addClass("lien_user").text("Commentaires");
                commentLink.attr("id", "comments");
                commentLink.attr("data-index", valueOfElement["id"]);
                // console.log(valueOfElement['id']);
                commentLinkDiv.append(commentLink);
                div2.append(profilePicLink, username, p, commentLinkDiv);
                row.append(div1, div2);
                $(".feed_container").append(row);
            });
        }
    });
    // $("#container_template").html(data["username"]);
};

function createConnection() {
    // $('#container_template').html('');
    // console.log('proutos');
    $.ajax("view/connexion.html", {
        success: function(response) {
            $('#container_template').html(response);
            // console.log(response);
        }
    });
}

function createRegister() {
    $.ajax("view/subscription.html", {
        success: function(response) {
            $('#container_template').html(response);
        }
    });
}

function createIndex() {
    $.ajax("view/test.html", {
        success: function(response) {
            $('#container_template').html(response);
        }
    });
}

function createSearchResults(data) {
    $(".feed_container").html("");
    $.each(data, function(indexInArray, valueOfElement) {
        // console.log(valueOfElement['username']);
        const row = $("<div></div>").addClass("member");
        const imageDiv = $("<div></div>").addClass("imgPseudo");
        const profilePic = $("<img>").attr("src", valueOfElement["profile_picture"]).addClass("img-responsive");
        profilePic.attr("id", "pseudoimg");
        const p = $("<p></p>").addClass("uname").text(valueOfElement["username"]);
        p.attr("id", "uName");
        imageDiv.append(profilePic, p);
        const userInfosDiv = $("<div></div>").addClass("firstLast");
        const first = $("<p></p>").text(valueOfElement["firstname"]);
        const last = $("<p></p>").text(valueOfElement["lastname"]);
        userInfosDiv.append(first, last);
        const btnDiv = $("<div></div>").addClass("memberbuttons");
        const btnAdd = $("<button></button>").addClass("iconebtn");
        const addPic = $("<img>").attr("src", "../view/media/add.png").addClass("img-responsive");
        addPic.attr("id", "icone1");
        btnAdd.append(addPic);
        const btnContact = $("<button></button>").addClass("iconebtn");
        const contactPic = $("<img>").attr("src", "../view/media/message.png").addClass("img-responsive smsicone");
        contactPic.attr("id", "icone2");
        btnContact.append(contactPic);
        btnDiv.append(btnAdd, btnContact);
        row.append(imageDiv, userInfosDiv, btnDiv);
        $(".feed_container").append(row);
    });
}
"use strict";

var chats = [
  {
    text: 'Hi, dude!',
    position: 'left'
  },
  {
    text: 'Wat?',
    position: 'right'
  },
  {
    text: 'You wanna know?',
    position: 'left'
  },
  {
    text: 'Wat?!',
    position: 'right'
  },
  {
    typing: true,
    position: 'left'
  }
];
for(var i = 0; i < chats.length; i++) {
  var type = 'text';
  if(chats[i].typing != undefined) type = 'typing';
  $.chatCtrl('#mychatbox', {
    text: (chats[i].text != undefined ? chats[i].text : ''),
    picture: (chats[i].position == 'left' ? 'assets/img/avatar/avatar-1.png' : 'assets/img/avatar/avatar-1.png'),
    position: 'chat-'+chats[i].position,
    type: type
  });
}

$("#chat-form").submit(function() {
  var me = $(this);

  if(me.find('input').val().trim().length > 0) {
    $.chatCtrl('#mychatbox', {
      text: me.find('input').val(),
      picture: 'assets/img/avatar/avatar-1.png',
    });
    me.find('input').val('');
  }
  return false;
});

var chats = [
  {
    text: 'Hai!',
    position: 'left'
  },
  {
    text: 'Hai, juga',
    position: 'right'
  },
  {
    text: 'Cuma ngetest aja',
    position: 'left'
  },
  {
    text: 'Siapppp',
    position: 'right'
  },
];
for(var i = 0; i < chats.length; i++) {
  var type = 'text';
  if(chats[i].typing != undefined) type = 'typing';
  $.chatCtrl('#mychatbox2', {
    text: (chats[i].text != undefined ? chats[i].text : ''),
    picture: (chats[i].position == 'left' ? 'http://127.0.0.1:8000/assets/img/avatar/avatar-1.png' : 'http://127.0.0.1:8000/assets/img/avatar/avatar-1.png'),
    position: 'chat-'+chats[i].position,
    type: type
  });
}
$("#chat-form2").submit(function() {
  var me = $(this);

  if(me.find('input').val().trim().length > 0) {
    $.chatCtrl('#mychatbox2', {
      text: me.find('input').val(),
      picture: 'http://127.0.0.1:8000/assets/img/avatar/avatar-1.png',
    });
    me.find('input').val('');
  }
  return false;
});

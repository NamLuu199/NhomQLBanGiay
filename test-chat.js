// # SimpleServer
// A simple chat bot server
var logger = require('morgan');
var http = require('http');
var bodyParser = require('body-parser');
var express = require('express');
var request = require('request');
var router = express();
var app = express();
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
  extended: false
}));
var server = http.createServer(app);
app.listen(process.env.PORT || 3000);
app.get('/', (req, res) => {
  res.send("Server chạy ngon lành.");
});
app.get('/webhook', function(req, res) {
  if (req.query['hub.verify_token'] === 'quandeptrai') {
    res.send(req.query['hub.challenge']);
  }
  res.send('Error, wrong validation token');
});
// Đoạn code xử lý khi có người nhắn tin cho bot
app.post('/webhook', function(req, res) {
  var entries = req.body.entry;
  for (var entry of entries) {
    var messaging = entry.messaging;
    for (var message of messaging) {
      var senderId = message.sender.id;
      if (message.message) {
        // Nếu người dùng gửi tin nhắn đến
        if (message.message.text) {
          var text = message.message.text;
          if(text == 'Hi' || text == "Hello")
          {
            sendMessage(senderId, "Xin Chào");
          }
          else if(text == 'Mày là ai?')
          {
            sendMessage(senderId, "Em là bot được viết bơi anh Nam Đẹp Trai");
          }
          else if(text == 'Đánh nhau không?')
          {
            sendMessage(senderId, "Đánh sợ đéo gì");
          }
          else if(text == 'Cho cái địa chỉ')
          {
            sendMessage(senderId, "Đối diện nhà 44 ngõ 296 Lĩnh Nam");
          }
          else if(text == 'Thế mày có biết maymay không')
          {
            sendMessage(senderId, "Ny anh Nam chứ giề");
          }
          else{sendMessage(senderId,  "Xin lỗi, câu hỏi của bạn chưa có trong hệ thống, chúng tôi sẽ cập nhật sớm nhất.");}
        }
      }
    }
  }
  res.status(200).send("OK");
});
// Gửi thông tin tới REST API để Bot tự trả lời
function sendMessage(senderId, message) {
  request({
    url: 'https://graph.facebook.com/v7.0/me/messages',
    qs: {
      access_token: "EAAMrAu8XNqQBAEVXclUqJFiM5h71fe2WrY9nrZB1ZC5xZAbSkNuBm51rZAY6ZCPI6Ar0MvdaZBmyX0lzsJwV52mdsuCYsiU0uPCp21JFydxbPMafsAusHbX91HeSqXBT0EBtaa3tyI1iqC4fEtrc62agQMqjXc7nsUrCZB0d6J53TfxDlIzEvVr",
    },
    method: 'POST',
    json: {
      recipient: {
        id: senderId
      },
      message: {
        text: message
      },
    }
  });
}
//app.js
App({
  onLaunch: function () {
    // 展示本地存储能力
    var logs = wx.getStorageSync('logs') || []
    logs.unshift(Date.now())
    wx.setStorageSync('logs', logs)
  
    // 登录
    wx.login({
      success: function (r) {
        var code = r.code;
        if (code) {
            //2、调用获取用户信息接口
            wx.getUserInfo({
              success: function (res) {
                //3.请求自己的服务器，绑定用户信息
                console.log( res.userInfo, code);
                wx.request({
                  url: 'https://www.hpday.cn/member/login',
                  method: 'post',
                  header: {
                    'content-type':
                    'application/x-www-form-urlencoded'
                  },
                  
                  data: { userInfo: res.userInfo,code:code },
                  success: function (data) {

                    //4.解密成功后 获取自己服务器返回的结果
                    if (data.success == true ) {
                      var userInfo_ = res.userInfo;
                      console.log(userInfo_)
                    } else {
                      console.log(data)
                    }

                  },
                  fail: function () {
                    console.log('系统错误')
                  }
                })
              },
              fail: function () {
                console.log('获取用户信息失败')
              }
            })

          } else {
            console.log('获取用户登录态失败！' + r.errMsg)
          }
         
       //
      }
    })
  },
  globalData: {
    userInfo: null
  }
})
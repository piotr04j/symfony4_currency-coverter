import  '../css/app.css'
import $ from 'jquery'

(() => {
  $('#currency-converter').submit((e) =>{
    e.preventDefault()

    const $form = $('#currency-converter')
    const data =$form.serialize()

    $.ajax({
      url: '/convert',
      method: 'POST',
      data,
      success: (res) => {
        $('#result').append('<p>sss</p>')
        console.log(res)
      },
      error: () => {
        console.log('nie dziala')
      }

    })
  })
})()
// JavaScript Document


$(document).ready(function(){


  var characters = [
      {
          name:'James P. Sulley Sullivan', 
          information:'James P. Sulley Sullivan may be the most celebrated Scarer in Monstropolis, but that doesn`t make him mean. When the softhearted monster has to care for Boo, he discovers that love and laughter are more powerful than making kids scream.', 
      },
      {
          name:'Mike Wazowski', 
          information:'Sulley`s scare assistant, best friend, and roommate doesn`t want any interruptions in his life—especially in his relationships. Although Mike thinks Boo is a "killing machine" at first, he later finds she`s a great audience for his natural comedic talent.', 
      },
      {
          name:'Boo', 
          information:'Boo has a vocabulary of about three words, but that doesn`t stop this curious human girl from stealing Sulley`s heart and overcoming her fear of Randall.', 
      },
      {
          name:'Randall Boggs', 
          information:'Able to scare even his co-workers with his chameleon abilities, Randall is one of the most wicked monsters in Monstropolis. His plan to capture the all-time scare record only scratches the surface of his sinister agenda.', 
      },
      {
          name:'Henry J. Waternoose III', 
          information:'Monsters, Inc. has been in the Waternoose family for generations, and Henry J. Waternoose III will do anything to beat the scream shortage and make his company profitable again.', 
      },
      {
          name:'Celia', 
          information:'The factory`s one-eyed, snake-haired receptionist must put her birthday celebration on hold as she gets caught in the middle of Sulley and Mike`s crazy predicament. Luckily, her love for Mike prevails and she comes to his rescue.', 
      },
      {
          name:'Roz', 
          information:'Dispatch Manager Roz may be slow moving and slow talking, but the quick-witted slug has her eye on everything—including Mike Wazowski’s lack of paperwork. She`s a No. 1 nut in Mike`s book and a No. 1 boss to others.', 
      },
      {
          name:'Child Detection Agency', 
          information:'Saving Monstropolis from human contamination is no small task. Clad in yellow suits, the highly trained Child Detection Agency (CDA) teams work around the clock eliminating wayward human goods and disinfecting hapless monsters. Nothing gets past these guys—not even a sock.', 
      }
    ];

   var txt ='';

  $('.characters .img_box img').attr('src','./images/detail1.jpg');
  txt+= '<dt>'+characters[0].name+'</dt>';
  txt+= '<dd>'+characters[0].information+'</dd>';
  $('.characters .detail').html(txt);
    
  $('.characters .character_list a').click(function(e){
      e.preventDefault();
    
      var ind = $(this).index('.character_list li a');
      txt ='';

      $('.characters .img_box img').attr('src','./images/detail'+(ind+1)+'.jpg');

      txt+= '<dt>'+characters[ind].name+'</dt>';
      txt+= '<dd>'+characters[ind].information+'</dd>';


      $('.characters .detail').html(txt);
  });
});


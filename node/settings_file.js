
const fs = require('fs');



module.exports = {

        "config":{},

        "kickStartSettings": function(){
            this.readfile();
            this.watchSettingFile();
        },
    "readfile":function(){


         var obj = this;
        fs.readFile('../public/config.json', 'utf8', function(err, data) {
            if (err) throw err;
            var JsnIObj = JSON.parse(data);
            for (var attriname in JsnIObj)
            {
                if(JsnIObj[attriname].length != 0)
                {
                    for(var key in JsnIObj[attriname])
                    {
                        //client.set(JsnIObj[attriname][key]['title'], JsnIObj[attriname][key]['value'], redis.print);

                        obj.config[JsnIObj[attriname][key]['title']]=JsnIObj[attriname][key]['value'];
                    }
                }
            }
        });

    },
    "watchSettingFile":function()
    {
        fs.watch('../public/config.json',function (eventType,filename) {
            if(eventType == 'change')
            {
                this.readfile();
            }

        });
    }
};




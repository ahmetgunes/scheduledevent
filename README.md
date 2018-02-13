
# ScheduledEvent

ScheduledEvent uses MQ's for throwing events, you can create a Message and pass it to the Managers. The object of the Manager is to publish the "Event" to the MQ and consume the incoming message and route using a Router.

### How to use

Implement the QueueManagerInterface, it should be constructing the Manager which publishes/consumes events. 
Different events must have their own classes, so that you can have your own data. 
Your message classes must implement `convert()` and `deConvert()` methods for converting your events to MQ of your choice. 

For example;

````php
    class SendSMSMessage extends AbstractMessage
    {
           protected $receiver;
           
           protected $text;
    }
```` 

__You are on your own while implementing the `RouterInterface` since you should do what you want with your events. The `$type` attribute can help you with that, but you can also use different Message classes for different events (Recommended way).__

__You should define your queues as priority queues since we use priority attributes.__

__If you pass a Unix timestamp as `$designatedDate` attribute your message will be requeued until that time comes__ 
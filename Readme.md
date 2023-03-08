## Gossiping Bus Drivers Kata

Bus drivers like to gossip, everyone knows that. And bus drivers can gossip when they end up at the same stop. So now we
are going to calculate after how many stops all the bus drivers know all the gossips. You will be given a number of bus
routes that the drivers follow. Each driver starts with one gossip. Each route is appointed to 1 driver. When 2 or more
drivers are at the same stop (even if it is the start), they can exchange all the gossips they know. A route looks like
this: 1 2 3 4 and is repeated over the whole day like this 1 2 3 4 1 2 3 4 1 2 3 … If a driver starts and stops at the
same stop then that is also repeated. All drivers take 1 minute to go from one stop to another and the gossip exchange
happens instantly. All drivers drive 8 hours a day so you have a maximum of 480 minutes to get all the gossiping around.

# Input
You will receive all the driver routes. Not all drivers have a route of the same length
 ```
3 1 2 3
3 2 3 1
4 2 3 4 5
 ```

```
2 1 2
5 2 8
```

# Output
The number of stops it takes to have all drivers on board with the latest gossips. If there is even one driver who does not have all the gossips by the end of the day, the answer is never.

```
Example 1: 5
```

```
Example 2: never
```

### Execute phpunit

You can execute phpunit directly with your local dependencies

```
vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```

or you can use Docker using this bash script

```
./test.sh
```

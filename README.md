# PHPDO

#### 基本原则
framework 唯一的职责是管理处理流程和流程中的对象生命周期，其他和该职责无关的事情都解耦出去。

#### 总体设计
![Alt text](https://raw.githubusercontent.com/dzthink/phpdo/master/framework%20%E8%AE%BE%E8%AE%A1%E6%80%9D%E8%B7%AF.png)

#### Library
三大library 是复用的基石，这一部分是静态层，三个级别library对应三个不同复用程度，在项目表现上没有任何区别，都是通过vendor引入到项目中的library，只是来源不同
	* Common Library：解决工程中通用需求，比如http，tcp包，数据库，文件系统等等
	* Org Library: 公司/团队级的通用包,比如腾讯L5，DI，AAA客户端，ckv客户端等等
	* App Library: 项目级别的通用包，在多个api应用之间共享，比如广告定向 ADS接口封装
可通过在公司搭建私有composer仓库来配合library管理

#### framework
framework层包含三个部分，处理流(process flow)、context、container

1. 处理器
	设计上处理器并非是框架实现的模块，但是处理器是Application和框架交互的连接点，框架定义处理器的接口，实现由应用完成，虽然对于框架而言，所有的处理器都只是在处理流中被调度的对象；单对于应用而言，一个完整的请求需要经过几个不同类型的处理器共同完成处理，通常情况下，一个http请求需要经过，路由，过滤器，请求处理，输出处理几个部分，在phpdo框架中，这些都被抽象为processor。
2. 处理流
	* 处理流是一个容器，它定义了参与处理请求的处理器规范及其顺序，请求上下文(context)依序穿过处理流，最终被处理为输出
	* 通常情况下，处理流的中第一个处理器是路由处理器，由框架启动时候产生，路由处理器填充处理流；处理流可以随时被任意处理器修改，所有处理器本质上是平等的，只是执行的处理任务，所以理论上一个请求可能被多个路由处理器处理
	
3. context
是对请求上下文环境及请求本身的抽象，它包含了处理请求所需要的全部信息，同时它也负责存放处理器产生的中间结果；context和处理器之间存在天然的耦合关系，http处理只能处理http请求产生的context，命令行处理器只能处理命令行请求产生的context

4. container
是负责管理依赖的容器，library的实例，处理器实例，application中的业务层等都应该被container管理

5. Config
这是一个在设计图中未被提及的部分，由于框架初始化过程需要大量使用配置，配置如果管理和访问是framework不可能缺少的部分，但是理论上它不是框架的核心内容，所以会提供一个接口定义和默认实现，可动态替换

#### Application 

基于上述library，framework我们可以开始实现实现我们的业务，这一步没有任何强制强制的定义，因为从理论上框架只需要定义处理器其可以运行，但是实现一个较为复杂的业务系统有一些最佳实践可以借鉴
1. 通常单应用目录及分层设计

```
config	//配置文件
controller //处理器
 |--router	//路由处理器
 |--reqProcessor //请求处理其，通常意义上的controller
 |--view //输出处理器
service  //业务接口封装
dal	//data access layer，封装对外的数据访问(数据库,文件，缓存，RPC...)
model //数据模型
helper //通用helper
test //测试
vendor //library引用
public //通常web应用的入口
```

2. 唯一注入框架执行的是controller，所以其他内容实际框架不关心，可以根据业务需要随意分目录
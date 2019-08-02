/*
Navicat MySQL Data Transfer

Source Server         : 192.168.88.131
Source Server Version : 50725
Source Host           : 192.168.88.131:3306
Source Database       : wangmeng

Target Server Type    : MYSQL
Target Server Version : 50725
File Encoding         : 65001

Date: 2019-07-31 10:41:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_admin
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `email` varchar(128) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(128) DEFAULT NULL COMMENT '密码',
  `user_name` varchar(128) DEFAULT NULL COMMENT '用户名',
  `phone` varchar(128) DEFAULT NULL COMMENT '电话',
  `status` int(2) DEFAULT NULL COMMENT '状态 1正常 -1禁用',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='后台管理员';

-- ----------------------------
-- Table structure for t_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `t_admin_role`;
CREATE TABLE `t_admin_role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `admin_id` bigint(20) DEFAULT NULL COMMENT '管理员id',
  `role_id` int(2) DEFAULT NULL COMMENT '角色id 1Admin 2Account Manager 3Finance 4Customer Service',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='管理员角色';

-- ----------------------------
-- Table structure for t_affiliate
-- ----------------------------
DROP TABLE IF EXISTS `t_affiliate`;
CREATE TABLE `t_affiliate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `affiliate_code` varchar(128) DEFAULT NULL COMMENT '业务编码 格式为A+年份（2位）+0001开始的数值',
  `email` varchar(128) DEFAULT NULL COMMENT '邮箱',
  `password` varchar(128) DEFAULT NULL COMMENT '密码 Md5加密',
  `affiliate_name` varchar(128) DEFAULT NULL COMMENT '公司名称',
  `invited_code` varchar(128) DEFAULT NULL COMMENT '邀请码',
  `address1` varchar(512) DEFAULT NULL COMMENT '地址1',
  `address2` varchar(512) DEFAULT NULL COMMENT '地址2',
  `city` varchar(128) DEFAULT NULL COMMENT '城市',
  `country_id` bigint(20) DEFAULT NULL COMMENT '国家id 对应t_country',
  `manager_id` bigint(20) DEFAULT NULL COMMENT '客户经理id',
  `first_name` varchar(128) DEFAULT NULL COMMENT '姓氏',
  `last_name` varchar(128) DEFAULT NULL COMMENT '名称',
  `phone` varchar(64) DEFAULT NULL COMMENT '电话',
  `status` int(2) DEFAULT NULL COMMENT '状态 1正常 -1禁用',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户信息 ';

-- ----------------------------
-- Table structure for t_affiliate_billing
-- ----------------------------
DROP TABLE IF EXISTS `t_affiliate_billing`;
CREATE TABLE `t_affiliate_billing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `address1` varchar(512) DEFAULT NULL COMMENT '地址1',
  `address2` varchar(512) DEFAULT NULL COMMENT '地址2',
  `city` varchar(128) DEFAULT NULL COMMENT '城市',
  `country_id` bigint(20) DEFAULT NULL COMMENT '国家id 对应t_country',
  `region` bigint(20) DEFAULT NULL COMMENT '区域 对应t_region',
  `zip_code` varchar(128) DEFAULT NULL COMMENT '邮编',
  `payment_method` varchar(128) DEFAULT NULL COMMENT '支付方式',
  `beneficiary_name` varchar(128) DEFAULT NULL COMMENT '受益人',
  `bank_name` varchar(128) DEFAULT NULL COMMENT '银行',
  `swift_number` varchar(128) DEFAULT NULL COMMENT '流水号',
  `account_number` varchar(128) DEFAULT NULL COMMENT '账号',
  `billing_frequency` int(2) DEFAULT NULL COMMENT '计费频率 1weekly 2monthly 3customize',
  `time_zone_id` bigint(20) DEFAULT NULL COMMENT '时区id 对应t_time_zone',
  `other_detail` varchar(512) DEFAULT NULL COMMENT '其他',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户计费信息 ';

-- ----------------------------
-- Table structure for t_affiliate_domain
-- ----------------------------
DROP TABLE IF EXISTS `t_affiliate_domain`;
CREATE TABLE `t_affiliate_domain` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `name` varchar(128) DEFAULT NULL COMMENT '名称',
  `domain_code` varchar(128) DEFAULT NULL COMMENT '业务编码 六位数，global型从G100001开始，Specific型从S100001开始',
  `affiliate_offer_id` bigint(20) DEFAULT NULL COMMENT 'affiliate-offer-id',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `domain_url` varchar(128) DEFAULT NULL COMMENT 'domain地址',
  `type` int(2) DEFAULT NULL COMMENT '类别 "0 Global 1 Specific 每个用户只能设置1个Global的主域,"',
  `status` int(2) DEFAULT NULL COMMENT '状态 1正常 -1禁用',
  `source_type` int(2) DEFAULT NULL COMMENT '来源类别 "0平台 1用户 为0时不在用户端展示,只作为tracking_url的默认主域"',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户域名信息 ';

-- ----------------------------
-- Table structure for t_affiliate_offer
-- ----------------------------
DROP TABLE IF EXISTS `t_affiliate_offer`;
CREATE TABLE `t_affiliate_offer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `payout` bigint(20) DEFAULT NULL COMMENT '费用 佣金(精确到分) 初始值为offer设置的值',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='用户offer信息 ';

-- ----------------------------
-- Table structure for t_billing
-- ----------------------------
DROP TABLE IF EXISTS `t_billing`;
CREATE TABLE `t_billing` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `billing_code` varchar(128) DEFAULT NULL COMMENT '结算单号 格式为B+6位年月日+4位，如B1906110001开始',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `total_amount` bigint(20) DEFAULT NULL COMMENT '总金额',
  `period_start_time` bigint(13) DEFAULT NULL COMMENT '开始时间 时间戳',
  `period_end_time` bigint(13) DEFAULT NULL COMMENT '结束时间 时间戳',
  `memo` varchar(1024) DEFAULT NULL COMMENT '备忘录',
  `type` int(2) DEFAULT NULL COMMENT '类别',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='结算单 ';

-- ----------------------------
-- Table structure for t_bonus
-- ----------------------------
DROP TABLE IF EXISTS `t_bonus`;
CREATE TABLE `t_bonus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `bonus_code` varchar(128) DEFAULT NULL COMMENT '奖励单号 格式为B+6位年月日+4位，如B1906110001开始',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `source_order_no` varchar(128) DEFAULT NULL COMMENT '原始订单号 type为2时有值',
  `related_order_no` varchar(128) DEFAULT NULL COMMENT 'erp关联订单号 type为2时有值(非必填项)',
  `repeat_order_count` int(2) DEFAULT NULL COMMENT '复购订单数量 type为2时有值',
  `amount` bigint(20) DEFAULT NULL COMMENT '金额 精确到分',
  `period_start_time` bigint(13) DEFAULT NULL COMMENT '账期开始时间 时间戳',
  `period_end_time` bigint(13) DEFAULT NULL COMMENT '账期结束时间 时间戳',
  `memo` varchar(512) DEFAULT NULL COMMENT '备忘录',
  `type` int(2) DEFAULT NULL COMMENT '类别 1Bonus 2Repeat Order',
  `status` int(2) DEFAULT NULL COMMENT '状态 0 未结算 1已结算',
  `billing_id` bigint(20) DEFAULT NULL COMMENT '结算单id 当有值时,该bonus已生成结算单',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='奖励单 ';

-- ----------------------------
-- Table structure for t_clicks_UTC00
-- ----------------------------
DROP TABLE IF EXISTS `t_clicks_UTC00`;
CREATE TABLE `t_clicks_UTC00` (
  `id` varchar(128) NOT NULL COMMENT '唯一id timeZone+yyyymmdd+affiliate+offer+offerPage+country',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `offer_page_id` bigint(20) DEFAULT NULL COMMENT 'offer-page-id',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `country_id` bigint(20) DEFAULT NULL COMMENT '国家id',
  `year` int(4) DEFAULT NULL COMMENT '年份 yyyy',
  `time_zone` varchar(8) DEFAULT NULL COMMENT '时区',
  `date` int(6) DEFAULT NULL COMMENT '日期 yyyyMMdd',
  `click_count` int(2) DEFAULT NULL COMMENT 'click数量',
  `finish_flag` int(2) DEFAULT NULL COMMENT '归档标记 "标识是否已完成归档,目标周期最后一次同步后进行标记 0未完结 1已完结"',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='clicks细粒度数据(东0区) ';

-- ----------------------------
-- Table structure for t_country
-- ----------------------------
DROP TABLE IF EXISTS `t_country`;
CREATE TABLE `t_country` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `short_name` varchar(128) DEFAULT NULL COMMENT '简写',
  `en_name` varchar(128) DEFAULT NULL COMMENT '英文名称',
  `cn_name` varchar(128) DEFAULT NULL COMMENT '中文名称',
  `code` varchar(128) DEFAULT NULL COMMENT '编码',
  `status` int(2) DEFAULT NULL COMMENT '状态 1正常 -1禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='国家信息';

-- ----------------------------
-- Table structure for t_creative
-- ----------------------------
DROP TABLE IF EXISTS `t_creative`;
CREATE TABLE `t_creative` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `type` int(2) DEFAULT NULL COMMENT '文件类别 1图片 2视频',
  `weight` int(2) DEFAULT NULL COMMENT '宽度',
  `height` int(2) DEFAULT NULL COMMENT '高度',
  `url` varchar(128) DEFAULT NULL COMMENT '文件地址',
  `status` int(2) DEFAULT NULL COMMENT '状态 1正常 -1禁用',
  `delete_flag` int(2) DEFAULT NULL COMMENT '删除标识 0未删除 1已删除',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='素材信息 ';

-- ----------------------------
-- Table structure for t_erp_order_0
-- ----------------------------
DROP TABLE IF EXISTS `t_erp_order_0`;
CREATE TABLE `t_erp_order_0` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `offer_page_id` bigint(20) DEFAULT NULL COMMENT 'offer-page-id',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `country_id` bigint(20) DEFAULT NULL COMMENT '来源国家id',
  `ip` varchar(32) DEFAULT NULL COMMENT '来源ip',
  `year` int(4) DEFAULT NULL COMMENT '年份 yyyy',
  `order_no` varchar(128) DEFAULT NULL COMMENT '订单编号 erp订单编号',
  `order_time` bigint(13) DEFAULT NULL COMMENT '订单时间 时间戳',
  `order_amount` bigint(20) DEFAULT NULL COMMENT '订单金额 精确到分',
  `order_currency` varchar(128) DEFAULT NULL COMMENT '订单币种',
  `order_status` int(2) DEFAULT NULL COMMENT '订单状态 "0pending 1Confirmed -1Cancelled -2Fraud Fraud:非offer目标地IP下的，在经人工审核后为“审核不通过”"',
  `finish_flag` int(2) DEFAULT NULL COMMENT '归档标记 "标识是否已完成归档,当order_status状态变更为非pending状态时进行标记 0 未归档 1已归档"',
  `payout` bigint(20) DEFAULT NULL COMMENT '费用 佣金(精确到分)',
  `billing_status` int(2) DEFAULT NULL COMMENT '结算状态 0 未结算 1已结算',
  `billing_id` bigint(20) DEFAULT NULL COMMENT '结算单id 当有值时,该订单已生成结算单',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `first_syn_time` bigint(13) DEFAULT NULL COMMENT '首次同步时间 时间戳',
  `audit_syn_time` bigint(13) DEFAULT NULL COMMENT '审核同步时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='erp订单数据(年按10取摸) ';

-- ----------------------------
-- Table structure for t_invited_info
-- ----------------------------
DROP TABLE IF EXISTS `t_invited_info`;
CREATE TABLE `t_invited_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `invited_code` varchar(128) DEFAULT NULL COMMENT '邀请码',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='邀请信息 ';

-- ----------------------------
-- Table structure for t_offer
-- ----------------------------
DROP TABLE IF EXISTS `t_offer`;
CREATE TABLE `t_offer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `name` varchar(128) DEFAULT NULL COMMENT '名称',
  `offer_code` varchar(128) DEFAULT NULL COMMENT '业务编码 取值1-6代表offer的六个类别，第2-6位顺序生成offer page的序号',
  `category` int(2) DEFAULT NULL COMMENT '分类 1Casino & Crypto 2Diet 3Sweepstakes 4ED/Muscle 5Skin 6Other',
  `description` varchar(512) DEFAULT NULL COMMENT '描述',
  `payout` bigint(20) DEFAULT NULL COMMENT '费用 佣金(精确到分)',
  `status` int(2) DEFAULT NULL COMMENT '状态 1Approved 0Pending -1Expired',
  `expired_time` bigint(13) DEFAULT NULL COMMENT '过期时间 时间戳',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='offer信息 ';

-- ----------------------------
-- Table structure for t_offer_country
-- ----------------------------
DROP TABLE IF EXISTS `t_offer_country`;
CREATE TABLE `t_offer_country` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `country_id` bigint(20) DEFAULT NULL COMMENT '国家id',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='offer国家信息 ';

-- ----------------------------
-- Table structure for t_offer_page
-- ----------------------------
DROP TABLE IF EXISTS `t_offer_page`;
CREATE TABLE `t_offer_page` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `name` varchar(128) DEFAULT NULL COMMENT '名称',
  `url` varchar(512) DEFAULT NULL COMMENT '地址',
  `page_code` varchar(128) DEFAULT NULL COMMENT 'page编码 "前一位代表类别，取值1-6代表offer的六个类别， 第2-6位顺序生成offer page的序号"',
  `delete_flag` int(2) DEFAULT NULL COMMENT '删除标识 0未删除 1已删除',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='offer页信息 ';

-- ----------------------------
-- Table structure for t_post_back
-- ----------------------------
DROP TABLE IF EXISTS `t_post_back`;
CREATE TABLE `t_post_back` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `affiliate_offer_id` bigint(20) DEFAULT NULL COMMENT 'affiliate-offer-id',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `type` int(2) DEFAULT NULL COMMENT '类别 1 Postback URL 2 iFrame Code 0 global_flag为0时取0',
  `goal` int(2) DEFAULT NULL COMMENT '目标 1 Lead 2 Confirmed',
  `url_code` varchar(128) DEFAULT NULL COMMENT 'URL/Code',
  `global_flag` int(2) DEFAULT NULL COMMENT '全局设置标识 0否 1是',
  `lead_url` varchar(512) DEFAULT NULL COMMENT 'Leads Url global_flag为1时有值',
  `confirmed_url` varchar(512) DEFAULT NULL COMMENT 'Confirmed Url global_flag为1时有值',
  `lead_code` varchar(512) DEFAULT NULL COMMENT 'Leads Code global_flag为1时有值',
  `confirmed_code` varchar(512) DEFAULT NULL COMMENT 'Confirmed Code global_flag为1时有值',
  `global_postback_flag` int(2) DEFAULT NULL COMMENT '全局生效标识 "0失效 1生效 global_flag为1时有值"',
  `global_pixel_flag` int(2) DEFAULT NULL COMMENT '全局生效标识 "0失效 1生效 global_flag为1时有值"',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='回传请求目标信息 ';

-- ----------------------------
-- Table structure for t_region
-- ----------------------------
DROP TABLE IF EXISTS `t_region`;
CREATE TABLE `t_region` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `country_id` bigint(20) DEFAULT NULL COMMENT '国家id',
  `short_name` varchar(128) DEFAULT NULL COMMENT '简写',
  `en_name` varchar(128) DEFAULT NULL COMMENT '英文名称',
  `cn_name` varchar(128) DEFAULT NULL COMMENT '中文名称',
  `code` varchar(128) DEFAULT NULL COMMENT '编码',
  `status` int(2) DEFAULT NULL COMMENT '状态 1正常 -1禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='地区信息';

-- ----------------------------
-- Table structure for t_time_zone
-- ----------------------------
DROP TABLE IF EXISTS `t_time_zone`;
CREATE TABLE `t_time_zone` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `en_name` varchar(128) DEFAULT NULL COMMENT '名称',
  `cn_name` varchar(128) DEFAULT NULL COMMENT '中文名称',
  `value` varchar(128) DEFAULT NULL COMMENT '值',
  `code` varchar(128) DEFAULT NULL COMMENT '编码',
  `status` int(2) DEFAULT NULL COMMENT '状态 1正常 -1禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='时区信息 ';

-- ----------------------------
-- Table structure for t_tracking_url
-- ----------------------------
DROP TABLE IF EXISTS `t_tracking_url`;
CREATE TABLE `t_tracking_url` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `affiliate_domain_id` bigint(20) DEFAULT NULL COMMENT 'affiliate-domain-id',
  `affiliate_id` bigint(20) DEFAULT NULL COMMENT '用户id',
  `offer_id` bigint(20) DEFAULT NULL COMMENT 'offer-id',
  `page_code` varchar(128) DEFAULT NULL COMMENT 'page编码 对应t_offer_page的page_code',
  `sub_id_1` varchar(128) DEFAULT NULL COMMENT 'sub_id_1',
  `sub_id_2` varchar(128) DEFAULT NULL COMMENT 'sub_id_2',
  `sub_id_3` varchar(128) DEFAULT NULL COMMENT 'sub_id_3',
  `sub_id_4` varchar(128) DEFAULT NULL COMMENT 'sub_id_4',
  `sub_id_5` varchar(128) DEFAULT NULL COMMENT 'sub_id_5',
  `key` varchar(128) DEFAULT NULL COMMENT '生成唯一的key 在click数据到达时进行验证',
  `create_time` bigint(13) DEFAULT NULL COMMENT '创建时间 时间戳',
  `update_time` bigint(13) DEFAULT NULL COMMENT '修改时间 时间戳',
  `creator` bigint(20) DEFAULT NULL COMMENT '创建人',
  `modifier` bigint(20) DEFAULT NULL COMMENT '修改人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='追踪地址信息 ';

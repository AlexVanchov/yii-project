-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table news.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) NOT NULL DEFAULT '0',
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table news.category: ~2 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `title`, `description`) VALUES
	(7, 'Market', 'About Market'),
	(8, 'Business', 'About Business'),
	(9, 'Tech', 'About Tech'),
	(10, 'Policy', 'About Policy');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table news.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(254) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `FK_news_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table news.news: ~15 rows (approximately)
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `description`, `date`, `category_id`) VALUES
	(21, 'The Corporate Argument for Bitcoin', '<p>Earlier in the week, MicroStrategy announced it purchased $25 million in bitcoin (BTC) in January. CEO Michael Saylor joined crypto podcast &ldquo;<a href="https://www.youtube.com/watch?v=09JD_ZTCKds">UpOnly</a>&rdquo; to reveal the back story of his company&rsquo;s move to&nbsp;<a href="https://www.coindesk.com/business/2022/02/01/microstrategy-buys-additional-25m-worth-of-bitcoin-during-market-dip/">accumulate 125,051 bitcoin</a>&nbsp;in 2020 and 2021.</p>\r\n\r\n<p>Founded in the late 1980s by Saylor, MicroStrategy (MSTR) is a publicly traded business intelligence and software provider, but it is now better known for the $4.7 billion in bitcoin it holds on its balance sheet.</p>\r\n\r\n<p>Before buying all that bitcoin, it was already one of the largest independent, publicly traded companies in its industry. In 2020, its revenue was nearly $480 million and it had an enviable 8.29% EBITDA (earnings before interest, taxes, depreciation and amortization) margin in the trailing 12 months before its first BTC purchase. When discussing the company&#39;s position during the &ldquo;UpOnly&rdquo; podcast, Saylor said, &ldquo;It&#39;s profitable, that&#39;s what we are. We love it, we&rsquo;ll keep doing it. But you can&#39;t really scale it.&rdquo;</p>\r\n\r\n<p>He then claimed that while the company was profitable, it wasn&rsquo;t viable to reinvest profits into hiring sprees or increasing marketing spending. That makes MicroStrategy a cash cow that keeps collecting cash on its balance sheet.</p>\r\n\r\n<p>That sounds like a good problem to have, except it becomes a problem if those accumulated dollars start diminishing in value because of inflation.</p>\r\n\r\n<p>The Federal Reserve&rsquo;s response in 2020 to COVID-19 with massive quantitative easing helped push the equities market to new highs, with investors favoring speculative growth stocks such as Tesla (TSLA) and tech monopolies such as Apple (AAPL) and Amazon (AMZN). Soaring stock prices allows those companies to make larger acquisitions and use their valuations to expand their operations with historically cheap capital, sending their stocks higher again, rinse and repeat.</p>\r\n\r\n<p>One stock that wasn&rsquo;t rallying was MicroStrategy&rsquo;s. In fact, it was a laggard for several years even before the pandemic hit. From the start of 2017 to the beginning of March 2020, the S&amp;P 500 was up nearly 31% while MicroStrategy shares fell 31%. The Federal Reserve&rsquo;s pandemic QE response didn&rsquo;t change things for MicroStrategy. As the S&amp;P 500 and many growth stocks approached the highs again just three months after March 2020&rsquo;s crash, MicroStrategy&rsquo;s stock continued to fall.</p>\r\n\r\n<p>In one of his many sailing analogies, Saylor likened his company&rsquo;s performance to rowing a boat against wind blowing harder than one can row. Even worse, inflation began to pick up and the purchasing power of cash cows was falling hard against the stock market and against any assets they might buy. Thus, buying bitcoin was like turning the rowboat around and sailing with the wind.</p>\r\n\r\n<p>On Aug. 11, 2020, MicroStrategy announced the purchase of 21,454 bitcoins for $250 million. While Saylor considered the purchase defensive, between Aug. 10, 2020 and the first week of 2021, the price of MSTR stock rose 263%, from $146.63 to $531.64.</p>\r\n\r\n<p>Those who didn&rsquo;t want a stake in a company buying bitcoin were offered a way to cash out through a&nbsp;<a href="https://www.businesswire.com/news/home/20200811005331/en/">$250 million cash tender offer via a modified Dutch auction</a>, which saw around $60 million in redemptions.</p>\r\n', '2022-02-06 01:00:00', 7),
	(22, 'Market Wrap: Bitcoin Rallies as Altcoins Take the Lead', '<p>Bitcoin (BTC) and other cryptocurrencies rallied on Friday, reversing losses from a few days ago. Alternative cryptocurrencies (altcoins) outperformed as ether (ETH), the world&#39;s second-largest cryptocurrency, gained 13% over the past 24 hours compared with an 11% rise in BTC.</p>\r\n\r\n<p>NEAR, the token associated with Near Protocol, a layer one blockchain that aims to overcome the limitations of its competitors including slow transaction rates, surged as much as 20% in the past 24 hours. The rise in altcoins relative to bitcoin could reflect a greater appetite for risk among crypto investors.</p>\r\n\r\n<p>&quot;Since late last year, there has been a continuing trend that even bitcoin&#39;s calming is enough for altcoins to return to growth and outperform the first cryptocurrency,&quot; Alex Kuptsikevich, an analyst at&nbsp;<a href="https://www.fxpro.com/" target="_blank">FxPro</a>, wrote in an email to CoinDesk.</p>\r\n\r\n<p>0 seconds of 1 minute, 27 secondsVolume 90%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Technical indicators point to additional price gains for bitcoin if buyers are able to maintain&nbsp;<a href="https://www.investopedia.com/terms/s/support.asp" target="_blank">support</a>&nbsp;above $37,000 over the weekend. Further, a decisive move above $40,000 could signal the start of a recovery phase.</p>\r\n\r\n<p>Over the past few weeks, several indicators such as the bitcoin&nbsp;<a href="https://alternative.me/crypto/fear-and-greed-index/" target="_blank">Fear &amp; Greed Index</a>, relative strength index (<a href="https://cmtassociation.org/kb/relative-strength-index-rsi/" target="_blank">RSI</a>) and a six-month high in the bitcoin options&nbsp;<a href="https://www.coindesk.com/markets/2022/01/31/bitcoins-put-call-ratio-hits-6-month-high-as-negativity-rules/" target="_blank">put/call ratio</a>&nbsp;signaled bearish extremes in the crypto market. Some analysts expect crypto buyers to return, similar to what occurred after the July 2020 price bottom at $28,000 BTC.</p>\r\n\r\n<h2>Latest prices</h2>\r\n\r\n<p>●<a href="https://www.coindesk.com/price/bitcoin/">Bitcoin</a>&nbsp;(BTC): $40569,&nbsp;+11.34%</p>\r\n\r\n<p>●<a href="https://www.coindesk.com/price/ethereum/">Ether</a>&nbsp;(ETH): $2955,&nbsp;+14.17%</p>\r\n\r\n<p>●S&amp;P 500 daily close: $4501,&nbsp;+0.52%</p>\r\n\r\n<p>●Gold: $1808 per troy ounce,&nbsp;+0.12%</p>\r\n\r\n<p>●Ten-year Treasury yield daily close: 1.93%</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Bitcoin, ether and gold prices are taken at approximately 4pm New York time. Bitcoin is the CoinDesk Bitcoin Price Index (XBX); Ether is the CoinDesk Ether Price Index (ETX); Gold is the COMEX spot price. Information about CoinDesk Indices can be found at&nbsp;<a href="http://coindesk.com/indices">coindesk.com/indices.</a></em></p>\r\n\r\n<h2>Short liquidations rise</h2>\r\n\r\n<p>Friday&#39;s crypto rally forced many&nbsp;<a href="https://www.investopedia.com/terms/s/shortselling.asp" target="_blank">short sellers</a>&nbsp;to liquidate positions.</p>\r\n\r\n<p>Liquidations occur when an exchange forcefully closes a trader&rsquo;s leveraged position as a safety mechanism due to a partial or total loss of the trader&rsquo;s initial margin. That happens primarily in futures trading.</p>\r\n\r\n<p>Ether traders, who reacted to a larger price jump, exited short positions in greater numbers than bitcoin traders over the past 24 hours. While the chart below does not indicate an extreme&nbsp;<a href="https://www.investopedia.com/terms/s/shortsqueeze.asp#:~:text=A%20short%20squeeze%20is%20an,the%20price%20jumps%20higher%20unexpectedly." target="_blank">short squeeze</a>, the steady decline in long liquidations since Jan. 20 crash could mean that selling pressure is starting to fade.</p>\r\n\r\n<p>&quot;Much of the momentum is likely due to $160 million of combined short liquidations for BTC and ETH over the past 24 hours,&quot; FundStrat wrote in a Friday note. That means large liquidations are partly responsible for accelerated price movements in the crypto spot market.</p>\r\n', '2022-02-06 01:00:00', 7),
	(23, 'Crypto Miner Merkle Among First to Get Bitmain’s Newest Liquid Cooling Mining Rigs', '<p>Privately held miner Merkle Standard will be one of the first crypto miners in the U.S. to get Bitmain&rsquo;s newest mining rig, the S19 Pro+ Hydro, which uses&nbsp;<a href="https://www.coindesk.com/business/2022/01/17/bitmain-adds-liquid-cooling-technology-to-its-latest-bitcoin-mining-rigs/">liquid cooling technology</a>. The new cooling technology can reduce heat, power consumption and noise, as well as extend the lifespan of the machines.</p>\r\n\r\n<p>California-based Merkle has signed a deal with Bitmain,&nbsp;<a href="https://www.coindesk.com/company/bitmain/">one of the world&rsquo;s largest bitcoin mining rig manufacturers</a>, to get a shipment of 4,449 of the newest mining computers in May, and expects the machines to add about 840 petahash per second (PH/s) of mining power to the company, according to a statement shared exclusively with CoinDesk.</p>\r\n\r\n<p>The S19 Pro+ Hydro miners were unveiled on Jan. 17, and have the most mining power among Bitmain&rsquo;s current offering of specialized bitcoin mining rigs known as ASICs.</p>\r\n\r\n<p>&ldquo;This order is a major milestone in the exponential growth of Merkle Standard and our partnership with Bitmain signifies our mission to develop sustainable and efficient operations, prioritizing the acquisition of high performing machines and embracing the latest technologies manufactured by our strategic partner Bitmain,&rdquo; said Ruslan Zinurov, CEO of Merkle Standard in a statement.</p>\r\n\r\n<p>Merkle&nbsp;<a href="https://news.bitcoin.com/sustainable-bitcoin-miner-merkle-standard-buys-13500-bitmain-mining-rigs-for-eastern-washington-flagship-site/">previously said</a>&nbsp;on Jan. 21 that it had executed a purchase agreement with Bitmain for 13,500 ASIC miners, consisting of both S19 XP and S19J Pro mining rigs.</p>\r\n\r\n<p>Merkle will deploy all the Bitmain miners at its flagship data center in Eastern Washington, which has 225 megawatt (MW) capacity, with potential expansion capabilities up to 500 MW. The miner expects to be net carbon negative and reach 4.6 exahash per second (EH/s) of mining power by the end of this year.</p>\r\n', '2022-02-01 01:00:00', 8),
	(24, 'DeFi Infrastructure Provider Qredo Raises $80M at $460M Valuation', '<p>Decentralized finance (<a href="https://www.coindesk.com/learn/what-is-defi/" target="_blank">DeFi</a>) infrastructure company Qredo&nbsp;<a href="https://www.businesswire.com/news/home/20220204005341/en/Qredo-Announces-an-80mm-Series-A-Raise-Led-by-10T-Holdings-with-Strategic-Investment-from-Coinbase-Avalanche-and-Terra">has raised $80 million</a>&nbsp;in an oversubscribed Series A round led by 10T Holdings, the crypto investment firm of hedge fund manager Dan Tapiero, at a $460 million valuation.</p>\r\n\r\n<p>The funding round included $60 million of primary capital and $20 million from secondary investors. The funds will help fuel growth, which includes potential acquisitions, further development of retail investor offerings and geographic expansion.</p>\r\n\r\n<p>Coinbase, Avalanche and Terra participated through strategic investments.</p>\r\n\r\n<p>Other investors in the round included Kingsway Capital, HOF Capital, Raptor Group and GoldenTree Asset Management.</p>\r\n\r\n<p>Qredo has now raised $120 million in the past year, including a seed round in May 2021 and a private token sale last June.</p>\r\n\r\n<p>Qredo offers a layer 2 protocol that enables instant cross-chain swaps and settlement on supported blockchains, all at a lower cost than layer 1 transactions.</p>\r\n\r\n<p>Qredo uses decentralized multi-party computation (MPC), a cryptographic tool that eliminates the need for individual keys, a security weak point, by allowing multiple computers to share private data representing a piece of the key.</p>\r\n\r\n<p>&ldquo;Infrastructure is a key battleground for scaling crypto adoption,&rdquo; 10T founder and CEO Dan Tapiero said in the press release. &ldquo;Qredo&rsquo;s distributed architecture and unique implementation of MPC is a game-changer for the secure custody and settlement of crypto assets.&rdquo;</p>\r\n\r\n<p>Last October,&nbsp;<a href="https://www.coindesk.com/business/2021/10/07/el-salvadors-state-owned-banco-hipotecario-taps-four-crypto-startups-for-blockchain-solutions/">Qredo was named&nbsp;</a>among four blockchain technology companies tapped by Banco Hipotecario de El Salvador, one of the country&rsquo;s four state-owned banks, to help the El Salvador adapt bitcoin as a legal tender.</p>\r\n', '2022-02-23 01:00:00', 8),
	(25, 'Calling a Hack an Exploit Minimizes Human Error', '<p>Yesterday, beginning at 18:24 UTC, someone or something exploited a security vulnerability on Wormhole, a tool that allows users to swap assets between Ethereum and a number of blockchains, resulting in the loss of 120,000 wrapped ether (or wETH, worth about $321 million) on the platform.</p>\r\n\r\n<p>This is the second largest decentralized finance (DeFi) attack to date, according to&nbsp;<a href="https://rekt.eth.link/leaderboard/">rekt&rsquo;s leaderboard</a>, in an industry where security exploits are fairly common and part of users&rsquo; risk curve. There&rsquo;s a whole business made out of code reviews, a lexicon of industry-specific jargon to explain what&rsquo;s going on and something of a playbook to follow if and when &ldquo;hacks&rdquo; inevitably occur.</p>\r\n\r\n<p><em><strong>This article is excerpted from The Node, CoinDesk&#39;s daily roundup of the most pivotal stories in blockchain and crypto news. You can subscribe to get the full&nbsp;</strong></em><a href="https://www.coindesk.com/newsletters"><em><strong>newsletter here</strong></em></a><em><strong>.</strong></em></p>\r\n\r\n<p>Wormhole, apart from catching and patching this bug earlier, has seemingly tried to do the right thing: They shut down the platform to prevent further losses, notified the public of what they know and announced Jump Trading is on the line to&nbsp;<a href="https://www.coindesk.com/business/2022/02/03/jump-trading-backstops-wormholes-320m-exploit-loss-sources/">replenish the stolen coins.</a></p>\r\n\r\n<p><em><strong>Read more:&nbsp;</strong></em><a href="https://www.coindesk.com/tech/2022/02/02/blockchain-bridge-wormhole-suffers-possible-exploit-worth-over-250m/"><em><strong>Blockchain Bridge Wormhole Suffers Possible Exploit Worth Over $326M</strong></em></a></p>\r\n\r\n<p>Furthermore, in a move that&rsquo;s becoming increasingly common, the Wormhole Deployer has posted an open message to the exploiter on Ethereum offering them a &ldquo;white hat agreement&rdquo; and $10 million for an explanation of the attack in exchange for the stolen funds.</p>\r\n\r\n<p>Excuse the simile, but this is like waiting for a magician to pull a rabbit from a top hat. The world is waiting to see whether they&rsquo;re dealing with a &ldquo;white&rdquo; or &ldquo;black&rdquo; hat hacker, terms meant to explain a hacker&rsquo;s motivations. The reality is likely to be a little more gray.</p>\r\n\r\n<p><strong>Hacks vs. exploits</strong></p>\r\n\r\n<p>&ldquo;Black hat hackers are criminals who break into computer networks with malicious intent,&rdquo; according to Kaspersky security experts. They may use malware, steal passwords or exploit code as it&rsquo;s written for &ldquo;self-serving&rdquo; or maybe &ldquo;ideological&rdquo; reasons. White hats, aka &ldquo;ethical hackers&rdquo; or &ldquo;good hackers,&rdquo; are the &ldquo;antithesis.&rdquo;&ldquo;They exploit computer systems or networks to identify their security flaws so they can make recommendations for improvement,&rdquo; Kaspersky writes.</p>\r\n\r\n<p>Due to the way crypto networks are designed, it&rsquo;s often unclear who it is you&rsquo;re dealing with. Users exist as long strings of alphanumeric gibberish, and their past is reduced to a series of transactions connected with their address.</p>\r\n\r\n<p>This system has some benefits. Even if platforms don&rsquo;t &ldquo;know&rdquo; their &ldquo;customers,&rdquo; all transactions are recorded on-chain and anyone can &ldquo;verify&rdquo; which coins belong to whom. DeFi exploits are often dead ends: Exchanges, used as on and off-ramps to and from the crypto economy, can blacklist stolen funds, reducing those token&rsquo;s utility and value to nothing.</p>\r\n\r\n<p>That may explain why some of the most prominent exploits see masterminds return their bounties. For instance, last August, the&nbsp;<a href="https://www.coindesk.com/markets/2021/08/12/most-of-stolen-funds-from-poly-network-hack-have-now-been-returned/">Poly Network &ldquo;hacker,&rdquo;</a>&nbsp;as they came to be referred to, returned nearly all of the $610 million worth of stolen crypto assets, and asked for people to see their exploit as a &ldquo;white hat hack,&rdquo; meant to bring awareness to a disastrous bug.</p>\r\n\r\n<p>This might be rewriting history &ndash; a post hoc explanation for an attack that was ultimately poorly executed? It might be happening again: We don&rsquo;t know the Wormhole exploiter&rsquo;s motivations, but the bridge&rsquo;s team seems to be asking that they eat the bug in exchange for a tidy $10 million.</p>\r\n\r\n<p>In a sense, the system is set up in an attacker&rsquo;s favor. When someone uses the code as it&rsquo;s written, but not as intended, technologists will refer to that as an &ldquo;exploit.&rdquo; Code is given precedence above human action, so that human errors &ndash; like fat fingering a bad transaction or missing a gaping security hole &ndash; are explained as a natural process of the code.</p>\r\n\r\n<p>An attack is only elevated to the level of a &ldquo;hack&rdquo; when the code is rewritten or broken. This is an important technological distinction, even though the terms likely stem from the gaming industry where &ldquo;hacking&rdquo; a game to gain an unfair advantage is often frowned upon whereas &ldquo;exploits,&rdquo; or finding loopholes in the game, are boasted about.</p>\r\n\r\n<p>It&rsquo;s probably fair to say this recent attack wasn&rsquo;t part of the Wormhole Deployer&rsquo;s plans or motivations. A mistake in the code was seemingly made, or not found, and solutions are being worked out. It might point to the &ldquo;fundamental security limits of bridges,&rdquo; as Ethereum co-creator Vitalik Buterin noted in a prescient blog posting a few weeks ago.</p>\r\n\r\n<p>The attacker conducted a series of transactions so that Wormhole &ldquo;smart contract&rdquo; confused falsely minted wETH will the real stuff &ndash; a&nbsp;<a href="https://www.coindesk.com/business/2022/02/03/jump-trading-backstops-wormholes-320m-exploit-loss-sources/">full breakdown here</a>. It was a loophole that someone with deep knowledge and a lot of time was able to exploit.</p>\r\n\r\n<p>Some people will consider this attack as a contribution to the overall body of knowledge about crypto. Some have even said this process may ultimately lead to&nbsp;<a href="https://www.coindesk.com/markets/2021/08/12/600m-poly-heist-shows-defi-needs-hackers-to-become-unhackable/">&ldquo;unhackable code,&rdquo;</a>&nbsp;as every smart contract is a potential &ldquo;million-dollar bug bounty.&rdquo;</p>\r\n\r\n<p>So, it&rsquo;s worth asking if the language crypto uses to explain its myriad vulnerabilities (risks stacked on risks) contributes to the ongoing business made out of hacks. Or if sometimes we&rsquo;re pulling definitions from hats.</p>\r\n\r\n<p>0 seconds of 6 minutes, 57 secondsVolume 90%</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-09-08 02:00:00', 9),
	(26, 'US Treasury Department Warns of NFT Risk in Art-Related Money Laundering', '<p>The U.S. Department of the Treasury warned that non-fungible tokens (NFT) may become a tool for money laundering in the high-value art market in a study published Friday.</p>\r\n\r\n<p>The 40-page report, published in accordance with the Anti-Money Laundering Act of 2020, found there is some evidence to suggest high-value art is involved in money laundering, but likely not in any terrorist financing. However, the document did suggest NFTs could be used to facilitate more illicit transactions in the art market.</p>\r\n\r\n<p>&quot;The emerging digital art market, such as the use of non-fungible tokens (NFT), may present new risks, depending on the structure and market incentives,&quot; a&nbsp;<a href="https://home.treasury.gov/news/press-releases/jy0588" target="_blank">press release</a>&nbsp;said.</p>\r\n\r\n<p>Art is relatively easy to transport and the art market has a &quot;long-standing culture of privacy&quot; that can enable easily manipulated prices, making high-value art vulnerable to money laundering,&nbsp;<a href="https://home.treasury.gov/system/files/136/Treasury_Study_WoA.pdf" target="_blank">the report&nbsp;</a>said.</p>\r\n\r\n<p>Different pieces of artwork have already been used to cover up the transfer or holding of funds acquired illicitly, the report said, pointing to the&nbsp;<a href="https://www.theguardian.com/world/2020/jul/03/us-government-seeks-to-seize-7m-warhol-artworks-linked-to-1mdb-scandal" target="_blank">1MDB scandal</a>&nbsp;as one example.</p>\r\n\r\n<p>NFTs and the broader, growing digital art sector can present new money laundering issues.</p>\r\n\r\n<p><em><strong>Read more:&nbsp;</strong></em><a href="https://www.coindesk.com/business/2022/02/02/new-chainalysis-report-suggests-nft-crime-doesnt-always-pay/" target="_blank"><em><strong>New Chainalysis Report Suggests NFT Crime Doesn&rsquo;t (Always) Pay</strong></em></a></p>\r\n\r\n<p>&quot;Recent sales of high-profile pieces of physical and digital art involving NFTs, including NFT-authenticated works such as Beeple&rsquo;s &#39;Everydays: The First 5000 Days,&#39; which sold at a Christie&rsquo;s auction for more than $69 million, indicate that this nascent art sector has reached similar valuations as traditional art mediums,&quot; the document said.</p>\r\n\r\n<p>The NFT market saw $1.5 billion in trading in the first quarter of 2021, compared to the $20 billion seen by the U.S. art market through all of 2020. Still, the report noted that legitimate auction houses and art dealers &quot;are increasingly offering NFTs,&quot; and highlighted the growth of platforms such as Dapper Labs, OpenSea and SuperRare.</p>\r\n\r\n<p>These platforms might be considered virtual asset service providers (VASP) by the Financial Action Task Force (FATF) and therefore be subject to existing know-your-customer (KYC) and anti-money laundering (AML) laws.</p>\r\n\r\n<p>The report also warned of the possibility of wash trading with NFTs.</p>\r\n\r\n<p>&quot;Furthermore, NFTs can be used to conduct self-laundering, where criminals may purchase an NFT with illicit funds and proceed to transact with themselves to create records of sales on the blockchain,&quot; the report said. &quot;The NFT could then be sold to an unwitting individual who would compensate the criminal with clean funds not tied to a prior crime.&quot;</p>\r\n\r\n<p>The report went on to say that some transactions may not be recorded on a public ledger, or could otherwise bypass any regulators or investigators watching for illicit funds.</p>\r\n\r\n<p>Smart contracts designed to automatically ensure the original artist receives royalty payments every time the NFT is sold could inadvertently encourage transactions that avoid the regulatory net, the document said.</p>\r\n', '2022-02-15 01:00:00', 10),
	(27, 'Yuan as Olympics Start', '<p>Sen. Pat Toomey (R-Pa.), a ranking member of the Senate Banking Committee, warned of the impact of China&rsquo;s digital yuan on U.S. economic and national security interests in a&nbsp;<a href="https://www.banking.senate.gov/imo/media/doc/toomey_letter_to_yellen_and_blinken_on_digital_yuan.pdf">letter to Treasury Secretary Janet Yellen and Secretary of State Antony Blinken</a>&nbsp;on Friday.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>&quot;Analysts have raised the eCNY&#39;s potential to subvert U.S. sanctions, facilitate illicit money flows, enhance China&#39;s surveillance capabilities and provide Beijing with &#39;first mover&#39; advantages such as setting standards in cross-border digital payments,&quot; Toomey wrote.</p>\r\n	</li>\r\n	<li>\r\n	<p>China is using the Winter Olympics in Beijing as an international test of its digital yuan, which it has been testing in the country since 2019. In Olympic Village, athletes and visitors can make purchases only with cash, a Visa card or the digital yuan, Toomey noted.</p>\r\n	</li>\r\n	<li>\r\n	<p>Toomey added, however, that China&rsquo;s crackdown on private cryptocurrencies gave a potential opening for the U.S.</p>\r\n	</li>\r\n	<li>\r\n	<p>&quot;China&#39;s crackdown presents an opportunity for the United States to be the forerunner of crypto innovation, grounded in individual freedom, and other American and democratic principles,&quot; he wrote.</p>\r\n	</li>\r\n	<li>\r\n	<p>Toomey has asked the Treasury and State departments to scrutinize Beijing&rsquo;s digital yuan rollout during the Olympics and provide a full briefing by March 7.</p>\r\n	</li>\r\n</ul>\r\n', '2022-02-05 01:00:00', 10),
	(28, 'Crypto Donations to Tor Surged 841% in 2021', '<p>Crypto donations to privacy-focused non-profit The Tor Project surged 841% in 2021 compared with the previous year, Tor said in a blog post from Monday.</p>\r\n\r\n<p>The Tor Project steers the development of the privacy network and web browser Tor. On Jan. 31, the team published&nbsp;<a href="https://blog.torproject.org/fundraising-2021-results/">the results</a>&nbsp;of its biggest fundraising drive, which took place over the last few months of 2021.</p>\r\n\r\n<p>Of $940,000 raised, 58% of donations were in cryptocurrencies. This is a much larger percentage compared to 2020, when donors sent $58,000 in crypto.</p>\r\n\r\n<p>&quot;It&#39;s clear that cryptocurrency folks are extremely philanthropic, and that they care deeply about privacy online,&quot; Tor Project fundraising director Al Smith told CoinDesk.</p>\r\n\r\n<p>Of the crypto donations, 68% ($371,000) where in the form of bitcoins, 28% ($154,000) were in ether, 2% ($9,000) in DAI and 1% ($7l) was in monero, a privacy coin.</p>\r\n\r\n<p>The cryptocurrency community is more privacy-conscious than most, going back to Bitcoin&#39;s creator, Satoshi Nakamoto, who hid his or her real identity when launching the digital currency system in 2009.</p>\r\n\r\n<p>The Tor network plays a big role in improving cryptocurrency privacy as well. Bitcoin core nodes provide the option of sending traffic over an encrypted privacy network to hide the node&#39;s IP addresses, shielding the node&#39;s location. According to the Bitcoin network tracking site&nbsp;<a href="https://bitnodes.io/nodes/">Bitnodes</a>, more than 51% of nodes run over the Tor network.</p>\r\n\r\n<p>The Tor Project started&nbsp;<a href="https://blog.torproject.org/announcement-tor-project-now-accepting-bitcoin-donations/">accepting bitcoin donations in 2013</a>&nbsp;before expanding to&nbsp;<a href="https://www.coindesk.com/markets/2019/03/22/you-can-now-donate-to-the-tor-project-in-9-different-cryptocurrencies/">accept nine other cryptocurrencies</a>&nbsp;in 2019.</p>\r\n', '2022-02-20 01:00:00', 9);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table news.news_comment
DROP TABLE IF EXISTS `news_comment`;
CREATE TABLE IF NOT EXISTS `news_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text DEFAULT NULL,
  `news_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table news.news_comment: ~1 rows (approximately)
DELETE FROM `news_comment`;
/*!40000 ALTER TABLE `news_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `news_comment` ENABLE KEYS */;

-- Dumping structure for table news.news_images
DROP TABLE IF EXISTS `news_images`;
CREATE TABLE IF NOT EXISTS `news_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `is_cover` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`news_id`),
  CONSTRAINT `FK__news` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table news.news_images: ~10 rows (approximately)
DELETE FROM `news_images`;
/*!40000 ALTER TABLE `news_images` DISABLE KEYS */;
INSERT INTO `news_images` (`id`, `news_id`, `url`, `is_cover`) VALUES
	(28, 21, 'uploads/987fa00dcd.jpg', 0),
	(29, 22, 'uploads/4e061bc17d.png', 0),
	(30, 23, 'uploads/0aedebd83f.jpg', 0),
	(31, 24, 'uploads/7571e00123.jpg', 0),
	(32, 25, 'uploads/d9e05dbd20.jpg', 0),
	(33, 26, 'uploads/765bb75227.jpg', 0),
	(34, 27, 'uploads/a422471b18.jpg', 0),
	(35, 28, 'uploads/760233edb9.jpg', 0);
/*!40000 ALTER TABLE `news_images` ENABLE KEYS */;

-- Dumping structure for table news.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_token` varchar(100) DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table news.user: ~2 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password`, `access_token`, `role`) VALUES
	(3, 'admin', 'asd', 'c3284d0f94606de1fd2af172aba15bf3', NULL, 'Admin'),
	(4, 'user', 'asd', 'c3284d0f94606de1fd2af172aba15bf3', NULL, 'User');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

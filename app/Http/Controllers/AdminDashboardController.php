<?php

namespace App\Http\Controllers;
use App\Models\SiteOption;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class AdminDashboardController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(AdminMiddleware::class);
    }

    public function index(){
        $data = (object) [
            'currency' => SiteOption::where('key', 'site-currency')->first() ?? 'USD'
        ];
        return view('dashboard.admin.index', compact('data'));
    }

    public function settings(){
        $data = (object) [
            'currency' => SiteOption::where('key', 'site-currency')->first() ?? 'USD',
            'serviceFee' => SiteOption::where('key', 'site-serviceFee')->first() ?? 5
        ];
        return view('dashboard.admin.settings', compact('data'));
    }


    /**
     * Active Coin View Controller function
     *
     * @return void
     */
    public function activeCoins() {
        $demoCoins = '[{"name": "Bitcoin", "symbol": "BTC", "isActive": false},{"name": "Ethereum", "symbol": "ETH", "isActive": false},{"name": "Tether", "symbol": "USDT", "isActive": false},{"name": "BNB", "symbol": "BNB", "isActive": false},{"name": "Solana", "symbol": "SOL", "isActive": false},{"name": "USDC", "symbol": "USDC", "isActive": false},{"name": "XRP", "symbol": "XRP", "isActive": false},{"name": "Dogecoin", "symbol": "DOGE", "isActive": false},{"name": "Cardano", "symbol": "ADA", "isActive": false},{"name": "TRON", "symbol": "TRX", "isActive": false},{"name": "Shiba Inu", "symbol": "SHIB", "isActive": false},{"name": "Avalanche", "symbol": "AVAX", "isActive": false},{"name": "Wrapped Bitcoin", "symbol": "WBTC", "isActive": false},{"name": "Chainlink", "symbol": "LINK", "isActive": false},{"name": "Polkadot", "symbol": "DOT", "isActive": false},{"name": "Bitcoin Cash", "symbol": "BCH", "isActive": false},{"name": "NEAR Protocol", "symbol": "NEAR", "isActive": false},{"name": "Uniswap", "symbol": "UNI", "isActive": false},{"name": "Polygon", "symbol": "MATIC", "isActive": false},{"name": "UNUS SED LEO", "symbol": "LEO", "isActive": false},{"name": "Multi Collateral DAI", "symbol": "DAI", "isActive": false},{"name": "Litecoin", "symbol": "LTC", "isActive": false},{"name": "Internet Computer", "symbol": "ICP", "isActive": false},{"name": "Ethereum Classic", "symbol": "ETC", "isActive": false},{"name": "Monero", "symbol": "XMR", "isActive": false},{"name": "Render Token", "symbol": "RNDR", "isActive": false},{"name": "Stellar", "symbol": "XLM", "isActive": false},{"name": "Filecoin", "symbol": "FIL", "isActive": false},{"name": "OKB", "symbol": "OKB", "isActive": false},{"name": "Stacks", "symbol": "STX", "isActive": false},{"name": "Crypto.com Coin", "symbol": "CRO", "isActive": false},{"name": "Lido DAO", "symbol": "LDO", "isActive": false},{"name": "The Graph", "symbol": "GRT", "isActive": false},{"name": "Maker", "symbol": "MKR", "isActive": false},{"name": "Arweave", "symbol": "AR", "isActive": false},{"name": "VeChain", "symbol": "VET", "isActive": false},{"name": "Cosmos", "symbol": "ATOM", "isActive": false},{"name": "Fantom", "symbol": "FTM", "isActive": false},{"name": "Injective", "symbol": "INJ", "isActive": false},{"name": "THETA", "symbol": "THETA", "isActive": false},{"name": "Fetch.ai", "symbol": "FET", "isActive": false},{"name": "THORChain", "symbol": "RUNE", "isActive": false},{"name": "Aave", "symbol": "AAVE", "isActive": false},{"name": "Hedera Hashgraph", "symbol": "HBAR", "isActive": false},{"name": "Algorand", "symbol": "ALGO", "isActive": false},{"name": "Flow", "symbol": "FLOW", "isActive": false},{"name": "KuCoin Token", "symbol": "KCS", "isActive": false},{"name": "Gala", "symbol": "GALA", "isActive": false},{"name": "Quant", "symbol": "QNT", "isActive": false},{"name": "Pendle", "symbol": "PENDLE", "isActive": false},{"name": "Axie Infinity", "symbol": "AXS", "isActive": false},{"name": "SingularityNET", "symbol": "AGIX", "isActive": false},{"name": "Bitcoin SV", "symbol": "BSV", "isActive": false},{"name": "Neo", "symbol": "NEO", "isActive": false},{"name": "Tezos", "symbol": "XTZ", "isActive": false},{"name": "Gnosis", "symbol": "GNO", "isActive": false},{"name": "The Sandbox", "symbol": "SAND", "isActive": false},{"name": "Akash Network", "symbol": "AKT", "isActive": false},{"name": "MultiversX", "symbol": "EGLD", "isActive": false},{"name": "GateToken", "symbol": "GT", "isActive": false},{"name": "Chiliz", "symbol": "CHZ", "isActive": false},{"name": "Nexo", "symbol": "NEXO", "isActive": false},{"name": "EOS", "symbol": "EOS", "isActive": false},{"name": "Decentraland", "symbol": "MANA", "isActive": false},{"name": "Conflux", "symbol": "CFX", "isActive": false},{"name": "eCash", "symbol": "XEC", "isActive": false},{"name": "DeXe", "symbol": "DEXE", "isActive": false},{"name": "Oasis", "symbol": "ROSE", "isActive": false},{"name": "Mina", "symbol": "MINA", "isActive": false},{"name": "IOTA", "symbol": "IOTA", "isActive": false},{"name": "Klaytn", "symbol": "KLAY", "isActive": false},{"name": "PancakeSwap", "symbol": "CAKE", "isActive": false},{"name": "Livepeer", "symbol": "LPT", "isActive": false},{"name": "Helium", "symbol": "HNT", "isActive": false},{"name": "Nervos Network", "symbol": "CKB", "isActive": false},{"name": "1inch Network", "symbol": "1INCH", "isActive": false},{"name": "Kava", "symbol": "KAVA", "isActive": false},{"name": "TrueUSD", "symbol": "TUSD", "isActive": false},{"name": "Theta Fuel", "symbol": "TFUEL", "isActive": false},{"name": "AIOZ Network", "symbol": "AIOZ", "isActive": false},{"name": "Synthetix", "symbol": "SNX", "isActive": false},{"name": "NXM", "symbol": "NXM", "isActive": false},{"name": "Rocket Pool", "symbol": "RPL", "isActive": false},{"name": "FTX Token", "symbol": "FTT", "isActive": false},{"name": "Trust Wallet Token", "symbol": "TWT", "isActive": false},{"name": "Compound", "symbol": "COMP", "isActive": false},{"name": "WOO", "symbol": "WOO", "isActive": false},{"name": "Curve DAO Token", "symbol": "CRV", "isActive": false},{"name": "Raydium", "symbol": "RAY", "isActive": false},{"name": "Ocean Protocol", "symbol": "OCEAN", "isActive": false},{"name": "WEMIX", "symbol": "WEMIX", "isActive": false},{"name": "XinFin Network", "symbol": "XDC", "isActive": false},{"name": "IoTeX", "symbol": "IOTX", "isActive": false},{"name": "Aragon", "symbol": "ANT", "isActive": false},{"name": "Golem", "symbol": "GLM", "isActive": false},{"name": "Kusama", "symbol": "KSM", "isActive": false},{"name": "MANTRA DAO", "symbol": "OM", "isActive": false},{"name": "Zcash", "symbol": "ZEC", "isActive": false},{"name": "SuperVerse", "symbol": "SUPER", "isActive": false},{"name": "Zilliqa", "symbol": "ZIL", "isActive": false}]';

        $activeCoins = SiteOption::where('key', 'active-coins')->first();
        if(empty($activeCoins)) {
            $this->updateSiteOptionsFn('active-coins', $demoCoins);
        }
        $data = (object) [
            'active_coins' => json_decode($activeCoins->value ?? $demoCoins)
        ];

        return view('dashboard.admin.trade.active-coins', compact('data'));
    }



    /**
     * getSiteOptions function
     *
     * @param Request $request key
     * @param Request $request value
     * @return void
     */

    public function getSiteOptions($key){
        // Check if the key 'site-currency' already exists and update it, or create a new entry if it doesn't exist
        $siteOptions = SiteOption::where('key', $key)->first();
        return $siteOptions ?? 'Not found';
    }

    /**
     * Update or create updateSiteOptions function
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public function updateSiteOptionsFn($key, $value)
    {
        // Sanitize and format the key
        $keyMsg = ucfirst(str_replace(' ', ' ', str_replace('-', ' ', $key)));

        // Check if the key 'site-currency' already exists and update it, or create a new entry if it doesn't exist
        SiteOption::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        return response()->json(['message' => $keyMsg .' updated!']);
    }

    /**
     * Update or create updateSiteOptions function
     *
     * @param Request $request key
     * @param Request $request value
     * @return void
     */

    public function updateSiteOptions(Request $request){
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);

        // Call the updateSiteOptions method
        return $this->updateSiteOptionsFn($request->key, $request->value);
    }
}

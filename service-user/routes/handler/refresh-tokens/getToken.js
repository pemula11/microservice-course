const { RefreshToken } =require('../../../models');

module.exports = async (req, res) => {
    if (!req.query.refresh_token){
        return res.status(404).json({
            status: 'error',
            message: 'Token not found'
        });
    }
    const refreshTokens = req.query.refresh_token;
    const token = await RefreshToken.findOne({
        where: { token: refreshTokens }
    });

    if(!token) {
        return res.status(400).json({
            status: 'error',
            message: 'invalid token'
        });
    }

    return res.json({
        status: 'success',
         token
    });
}

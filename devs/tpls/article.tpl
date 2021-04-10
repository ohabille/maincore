[[ skeleton homeBase ]]

    [[ block CONTENT ]]
        <p>
            <div>
                <strong>{? =article/titre ?}</strong> <em>
                    <a href="{? =host ?}categorie/{? =article/categorieurl ?}">
                        {? =article/categorie ?}
                    </a>
                </em>
            </div>
            <div>
                par <a href="{? =host ?}member/{? =article/memberurl ?}">
                    {? =article/member ?}
                </a>
                , le {? =article/weekday ?} {? =article/mday ?} {? =article/month ?} {? =article/year ?}
            </div>
            <div>
                {? =article/accroche ?}
            </div>
            <div>
                {? =article/texte ?}
            </div>
        </p>
    [[ endblock ]]

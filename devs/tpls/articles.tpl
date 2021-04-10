[[ skeleton homeBase ]]

    [[ block CONTENT ]]
        {? for articles ?}
        <p>
            <div>
                <strong>{? dataName titre ?}</strong> <em>
                    <a href="{? =host ?}categorie/{? dataName categorieurl ?}">
                        {? dataName categorie ?}
                    </a>
                </em><br />
                <a href="{? =host ?}member/{? dataName memberurl ?}">{? dataName member ?}</a>
            </div>
            <div>
                par {? dataName member ?}, le {? dataName weekday ?} {? dataName mday ?} {? dataName month ?} {? dataName year ?}
            </div>
            <div>
                {? dataName accroche ?}
            </div>
            <div>
                <a href="{? =host ?}article/{? dataName titreurl ?}">Lire la suite</a>
            </div>
        </p>
        {? endFor ?}
    [[ endblock ]]
